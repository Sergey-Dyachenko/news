<?php


namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends BaseApiController
{
    public function __construct(SubscriptionService $service)
    {
        parent::__construct($service);
    }

    public function store(Request $request)
    {
        \App::make('App\Http\Requests\StoreSubscriptionData');
        $request->request->add(['subscriber_id' => \Auth::id() ]);
        return parent::store($request);
    }
}
