<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Masters\ChildService;
use Illuminate\Support\Facades\Storage;

class ChildController extends Controller
{
    public function __construct(private ChildService $child) {}
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'success get child',
            'data' => $this->child->dataChild([])->get()->map(function ($child) {
                return [
                    'id' => $child->id,
                    'age' => $child->age,
                    'note' => $child->note,
                    'vaccine' => $child->vaccine,
                    'headCircumference' => $child->head_circumference,
                    'weight' => $child->weight,
                    'height' => $child->height,
                    'articles' => $child->articles->map(function ($article) {
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
        ]);
    }
}
