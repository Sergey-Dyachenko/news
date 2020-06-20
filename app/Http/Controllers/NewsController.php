<?php


namespace App\Http\Controllers;


use App\Events\CreatedNewNews;
use App\Http\Requests\NewsDataStore;
use App\Services\NewsService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class NewsController extends BaseApiController
{
    public function __construct(NewsService $service)
    {
        parent::__construct($service);
    }

    public function store(Request $request)
    {
        \App::make('App\Http\Requests\NewsDataStore');
        $request->request->add(['user_id' => \Auth::id() ]);
        $news = parent::store($request);
        event(new CreatedNewNews($news));
        return $news;
    }

    public function mostCommented()
    {
        return $this->service->mostCommented();
    }

}
