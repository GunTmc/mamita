<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Masters\DataArticleRequest;
use App\Services\Masters\ArticleService;
use App\Services\Masters\PregnancyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct(
        private ArticleService $articleService,
        private PregnancyService $pregnancyService
    ) {}
    public function index(DataArticleRequest $dataArticleRequest)
    {
        $request = $dataArticleRequest->validated();
        return response()->json([
            'success' => true,
            'message' => 'Success get data article',
            'data' => $this->articleService->dataArticle($request)->get()->map(function ($article) {
                return [
                    'id' => $article->id,
                    'title' => $article->title,
                    'description' => $article->description,
                    'image' => Storage::url($article->image),
                    'created_at' => $article->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $article->updated_at->format('Y-m-d H:i:s')
                ];
            })->toArray(),
        ]);
    }
}
