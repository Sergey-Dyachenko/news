<?php


namespace App\Services;

use App\Repositories\NewsRepository;

class NewsService extends BaseService
{
    public function __construct(NewsRepository $newsRepository)
    {
        $this->repo = $newsRepository;
    }

    public function mostCommented()
    {
      return  $this->repo->getMostCommentedNews();
    }
}
