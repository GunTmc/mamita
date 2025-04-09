<?php

namespace App\Repositories\Masters\Articles;

use App\Models\Masters\Article;

class ArticleRepository
{
    public function getAllArticles($params)
    {
        return Article::where('source_id', $params['sourceId'])
            ->orderBy('created_at', 'desc');
    }

    public function getArticleById($id)
    {
        return Article::where('id', $id)->first();
    }

    public function updateArticleById($data, $id)
    {
        return Article::where('id', $id)->update($data);
    }

    public function deleteArticleById($id)
    {
        return Article::where('id', $id)->delete();
    }

    public function createArticle($data)
    {
        return Article::create($data);
    }
}
