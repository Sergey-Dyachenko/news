<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginDataValidateForShowToken;
use App\Http\Requests\UserSignUpDataStore;
use App\Http\Resources\Users;
use App\Services\UserService;
use Illuminate\Http\Response;
use App\Mail\VerificationEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function signup(UserSignUpDataStore $request)
    {
       $user = $this->userService->create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password),
           'email_verification_token' => Str::random(40)
        ]);
       Mail::to($user->email)->send(new VerificationEmail($user));
        return response()->json([
            'message' => 'Successfully created user!'
        ], Response::HTTP_CREATED );
    }

    public function login(LoginDataValidateForShowToken $request)
    {
        $user = $this->userService->showOneByData([
            'email' => $request['email']
        ]);
        $_token = $this->getToken($user);
        return response()->json([
            'msg' => 'You are successfully login',
            'access_token' => $_token
        ], Response::HTTP_OK);


    }

    public function showAuthUserProfile()
    {
        return new Users($this->userService->showOneByData(['id' => \Auth::id()]));
    }

    public function getToken($user): string
    {

        $_token = $user->createToken('Personal Access Token')->accessToken;
        $user->update(['token_expiration_date' => Carbon::now()->addDays(3)]);
        return $_token;
    }

    public function verifyEmail($token = null)
    {
        if($token == null) {

            return response()->json([
                'msg' => 'Token was not provided',
            ], Response::HTTP_NOT_FOUND);

        }

        $user = $this->userService->showOneByData([
            'email_verification_token' => $token
        ]);

        if($user == null ){

            return response()->json([
                'msg' => 'User was not found',
            ], Response::HTTP_NOT_FOUND);

        }

        $this->userService->update([
            'email_verified_at' => Carbon::now(),
            'email_verification_token' => ''
        ], $user->id);
        return response()->json([
            'msg' => 'You successfully verified you email',
        ], Response::HTTP_OK);

    }


}
