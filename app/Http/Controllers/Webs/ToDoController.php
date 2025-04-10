<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use App\Repositories\Masters\ToDo\ToDoRepository;

class ToDoController extends Controller
{
    public function __construct(private ToDoRepository $toDoRepository) {}
    public function index($userId)
    {
        return view('users.toDo', [
            'toDos' => $this->toDoRepository->getTodosByUserId($userId),
            'title' => 'To Do'
        ]);
    }
}
