<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Food\DeleteFoodRequest;
use App\Http\Requests\Food\EditFoodRequest;
use App\Http\Requests\Food\StoreFoodRequest;
use App\Http\Requests\Food\UpdateFoodRequest;
use App\Models\Food;
use App\Services\Masters\FoodService;

class FoodController extends Controller
{
    public function __construct(private FoodService $foodService) {}

    public function index()
    {
        return view('masters.food.indexFood', [
            'foods' => $this->foodService->dataFood([])->get(),
            'title' => 'Food'
        ]);
    }

    public function create()
    {
        return view('masters.food.createFood', [
            'categories' => Food::CATEGORY_AVAILABLE
        ]);
    }

    public function store(StoreFoodRequest $storeFoodRequest)
    {
        $request = $storeFoodRequest->validated();
        $this->foodService->storeFood($request);
        return redirect()->route('food.index');
    }
    public function edit(EditFoodRequest $editFoodRequest)
    {
        return view('masters.food.editFood', [
            'food' => $this->foodService->getFood($editFoodRequest->validated()),
            'categories' => Food::CATEGORY_AVAILABLE
        ]);
    }

    public function update(UpdateFoodRequest $updateFoodRequest)
    {
        $request = $updateFoodRequest->validated();
        $this->foodService->updateFood($request);
        return redirect()->route('food.index');
    }

    public function destroy(DeleteFoodRequest $deleteFoodRequest)
    {
        $request = $deleteFoodRequest->validated();
        $this->foodService->deleteFood($request);
        return redirect()->route('food.index');
    }
}
