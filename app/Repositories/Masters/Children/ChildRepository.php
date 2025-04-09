<?php

namespace App\Repositories\Masters\Children;

use App\Models\Masters\Child;

class ChildRepository
{

    public function getAllChildren($params)
    {
        return Child::orderByRaw('CAST(age AS DECIMAL(10,2)) ASC');
    }

    public function getChildById($id)
    {
        return Child::where('id', $id)->first();
    }

    public function createChild($data)
    {
        return Child::create($data);
    }
    public function updateChildById($data, $id)
    {
        return Child::where('id', $id)->update($data);
    }
    public function deleteChildById($id)
    {
        return Child::where('id', $id)->delete();
    }
}
