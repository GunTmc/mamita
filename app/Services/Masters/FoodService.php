<?php

namespace App\Services\Masters;

use App\Repositories\Masters\Foods\FoodRepository;
use Illuminate\Support\Facades\Storage;

class FoodService
{
    public function __construct(private FoodRepository $foodRepository) {}

    public function dataFood($data)
    {
        return $this->foodRepository->getAllFoods($data);
    }

    public function storeFood($data)
    {
        $image = Storage::put('foods', $data['image']);
        return $this->foodRepository->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $image,
            'category' => $data['category']
        ]);
    }

    public function updateFood($data): bool
    {
        $food = $this->foodRepository->getFoodById($data['id']);
        $image = isset($data['image']) ?  Storage::put('foods', $data['image']) : $food->image;
        return $this->foodRepository->updateFoodById([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $image,
            'category' => $data['category']
        ], $data['id']);
    }

    public function deleteFood($data)
    {
        return $this->foodRepository->deleteFoodById($data['id']);
    }

    public function getFood($data)
    {
        return $this->foodRepository->getFoodById($data['id']);
    }
}
