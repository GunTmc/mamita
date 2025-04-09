<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Masters\FoodService;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function __construct(private FoodService $foodService) {}

    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Success get data food',
            'data' => $this->foodService->dataFood([])->get()->map(function ($food) {
                return [
                    'id' => $food->id,
                    'name' => $food->name,
                    'description' => $food->description,
                    'image' => Storage::url($food->image),
                    'category' => $food->category
                ];
            })->toArray(),
        ]);
    }
}
