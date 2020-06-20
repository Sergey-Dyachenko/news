<?php


namespace App\Repositories;


use App\News;

class NewsRepository extends BaseRepository
{
    public function __construct(News $model)
    {
        $this->model = $model;
    }

    public function getMostCommentedNews()
    {
       return $this->withCountRelation('comments')->orderBy('comments_count', 'desc')->get();
    }
}
