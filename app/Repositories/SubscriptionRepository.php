<?php


namespace App\Repositories;


use App\Subscription;

class SubscriptionRepository extends BaseRepository
{
    public function __construct(Subscription $model)
    {
        $this->model = $model;
    }
}
