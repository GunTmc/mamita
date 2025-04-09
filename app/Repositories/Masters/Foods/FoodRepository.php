<?php

namespace App\Repositories\Masters\Foods;

use App\Models\Food;

class FoodRepository
{
    public function getAllFoods($params)
    {
        return Food::orderBy('name', 'asc');
    }

    public function getFoodById($id)
    {
        return Food::find($id);
    }

    public function updateFoodById($data, $id)
    {
        return Food::where('id', $id)->update($data);
    }

    public function deleteFoodById($id)
    {
        return Food::where('id', $id)->delete();
    }

    public function create($data)
    {
        return Food::create($data);
    }
}
