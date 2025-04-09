<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToDo\DeleteToDoRequest;
use App\Http\Requests\ToDo\EditToDoRequest;
use App\Http\Requests\ToDo\StoreToDoRequest;
use App\Http\Requests\ToDo\UpdateToDoRequest;
use App\Services\Masters\ToDoService;

class ToDoController extends Controller
{
    public function __construct(private ToDoService $toDoService) {}
    public function index()
    {
        return view('masters.toDo.index', [
            'toDos' => $this->toDoService->dataToDo([])->get(),
            'title' => 'To Do'
        ]);
    }

    public function create()
    {
        return view('masters.toDo.create');
    }

    public function store(StoreToDoRequest $storeToDoRequest)
    {
        $request = $storeToDoRequest->validated();
        $this->toDoService->StoreToDo($request);
        return redirect()->route('toDo.index');
    }

    public function edit(EditToDoRequest $editToDoRequest)
    {
        return view('masters.toDo.edit', [
            'toDo' => $this->toDoService->getToDo($editToDoRequest->validated())
        ]);
    }

    public function update(UpdateToDoRequest $updateToDoRequest)
    {
        $request = $updateToDoRequest->validated();
        $this->toDoService->updateToDo($request);
        return redirect()->route('toDo.index');
    }

    public function destroy(DeleteToDoRequest $deleteToDoRequest)
    {
        $request = $deleteToDoRequest->validated();
        $this->toDoService->deleteToDo($request);
        return redirect()->route('toDo.index');
    }
}
