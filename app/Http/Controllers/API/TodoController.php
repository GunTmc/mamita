<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserToDo;
use App\Repositories\Masters\ToDo\ToDoRepository;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct(private ToDoRepository $toDoRepository) {}

    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Success get data todo',
            'data' =>
            $this->toDoRepository->getTodosByUserId(request()->user()->id)->map(function ($todo) {
                return [
                    'id' => $todo->id,
                    'description' => $todo->description,
                    'status' => $todo->user_to_do_status,
                ];
            })->toArray()
        ]);
    }

    public function update(Request $request, $id)
    {

        $toDo = $this->toDoRepository->getToDoById($id);
        if ($toDo) {
            UserToDo::updateOrCreate([
                'user_id' => request()->user()->id,
                'to_do_id' => $id,
            ], [
                'user_id' => request()->user()->id,
                'to_do_id' => $id,
                'status' => isset($request['value']) ? $request['value'] == 'true' : false
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Success update todo',
                'data' => null
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Todo not found',
                'data' => null
            ])->setStatusCode(400);
        }
    }
}
