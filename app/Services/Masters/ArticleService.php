<?php

namespace App\Services\Masters;

use App\Repositories\Masters\Articles\ArticleRepository;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public function __construct(private ArticleRepository $articleRepository) {}

    public function dataArticle($data)
    {
        return $this->articleRepository->getAllArticles($data);
    }

    public function createArticle($data)
    {
        return $this->articleRepository->createArticle([
            'source_id' => $data['sourceId'],
            'title' => $data['title'],
            'body' => $data['body'],
            'type' => $data['type'],
            'image' => isset($data['image']) ? Storage::put('articles', $data['image']) : null,
        ]);
    }

    public function  updateArticle($data)
    {
        $article = $this->articleRepository->getArticleById($data['id']);
        $image = isset($data['image']) ? Storage::put('articles', $data['image']) : $article->image;
        return $this->articleRepository->updateArticleById([
            'title' => $data['title'],
            'body' => $data['body'],
            'image' => $image
        ], $data['id']);
    }

    public function deleteArticle($data)
    {
        return $this->articleRepository->deleteArticleById($data['id']);
    }

    public function getArticle($data)
    {
        return $this->articleRepository->getArticleById($data['id']);
    }
}
