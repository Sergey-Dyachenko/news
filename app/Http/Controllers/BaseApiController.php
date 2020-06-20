<?php


namespace App\Http\Controllers;


use App\Services\BaseServiceInterface;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

abstract class BaseApiController implements BaseApiInterface
{
   protected $service;
   public function __construct(BaseServiceInterface $service)
   {
     $this->service = $service;
   }

    public function store(Request $request)
    {
      return $this->service->create($request->all());
    }

    public function index()
    {
       return $this->service->all();
    }

    public function destroy($id)
    {
      return  $this->service->destroy($id);
    }

    public function show($id)
    {
        $this->service->showOneByData($id);
    }

    public function update($id, $input)
    {
       return $this->service->update($id, $input);
    }
}
