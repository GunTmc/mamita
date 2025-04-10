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

    public function getTodosByUserId($userId)
    {
        return ToDo::leftJoin('user_to_dos', function ($join) use ($userId) {
            $join->on('to_dos.id', '=', 'user_to_dos.to_do_id')
                ->where('user_to_dos.user_id', '=', $userId);
        })
            ->select('to_dos.*', 'user_to_dos.status as user_to_do_status')
            ->get();
    }
}
