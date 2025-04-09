<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Masters\CreateArticleRequest;
use App\Http\Requests\Masters\DataArticleRequest;
use App\Http\Requests\Masters\EditArticleRequest;
use App\Http\Requests\Masters\StoreArticleRequest;
use App\Http\Requests\Masters\UpdateArticleRequest;
use App\Services\Masters\ArticleService;
use App\Services\Masters\PregnancyService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(
        private ArticleService $articleService,
        private PregnancyService $pregnancyService
    ) {}
    public function index(DataArticleRequest $dataArticleRequest)
    {
        $request = $dataArticleRequest->validated();
        return view('masters.indexArticles', [
            'articles' => $this->articleService->dataArticle($request)->get()
        ]);
    }

    public function create(CreateArticleRequest $createArticleRequest)
    {
        $createArticleRequest->validated();
        return view('masters.createArticle');
    }

    public function store(StoreArticleRequest $storeArticleRequest)
    {
        $request = $storeArticleRequest->validated();
        $this->articleService->createArticle($request);
        return redirect()->route('article.index', ['type' => $request['type'], 'sourceId' => $request['sourceId']]);
    }

    public function edit(EditArticleRequest $editArticleRequest)
    {
        $request = $editArticleRequest->validated();
        return view('masters.editArticle', [
            'article' => $this->articleService->getArticle($request)
        ]);
    }

    public function update(UpdateArticleRequest $updateArticleRequest)
    {
        $request = $updateArticleRequest->validated();
        $this->articleService->updateArticle($request);
        return redirect()->route('article.index', ['type' => $request['type'], 'sourceId' => $request['sourceId']]);
    }
}
