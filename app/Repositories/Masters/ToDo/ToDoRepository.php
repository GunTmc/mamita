<?php

namespace App\Repositories\Masters\ToDo;

use App\Models\Masters\ToDo;

class ToDoRepository
{


    public function getAllToDos($params)
    {
        return ToDo::orderBy('created_at', 'asc');
    }

    public function createToDo($data)
    {
        return ToDo::create($data);
    }

    public function updateToDoById($data, $id)
    {
        return ToDo::where('id', $id)->update($data);
    }

    public function deleteToDoById($id)
    {
        return ToDo::where('id', $id)->delete();
    }

    public function getToDoById($id)
    {
        return ToDo::where('id', $id)->first();
    }
}
