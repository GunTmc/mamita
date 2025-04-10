<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Masters\PregnancyService;
use Illuminate\Support\Facades\Storage;

class PregnancyController extends Controller
{
    public function __construct(private PregnancyService $pregnancyService) {}

    public function index()
    {
        return response()->json(
            [
                'status' => true,
                'message' => 'success get pregnancy',
                'data' => $this->pregnancyService->DataPregnancy([])->get()->map(function ($pregnancy) {
                    return [
                        'id' => $pregnancy->id,
                        'note' => $pregnancy->note,
                        'usg' => $pregnancy->usg ? Storage::url($pregnancy->usg) : null,
                        'fetus' => $pregnancy->fetus ? Storage::url($pregnancy->fetus) : null,
                        'gestationalAge' => $pregnancy->gestational_age,
                        'createdAt' => $pregnancy->created_at->format('Y-m-d H:i:s'),
                        'updatedAt' => $pregnancy->updated_at->format('Y-m-d H:i:s'),
                        'articles' => $pregnancy->articles->map(function ($article) {
                            return [
                                'id' => $article->id,
                                'title' => $article->title,
                                'body' => $article->body,
                                'image' => Storage::url($article->image),
                                'created_at' => $article->created_at->format('Y-m-d H:i:s'),
                                'updated_at' => $article->updated_at->format('Y-m-d H:i:s')
                            ];
                        })
                    ];
                })->toArray(),
            ]
        );
    }
}
