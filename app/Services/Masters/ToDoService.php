<?php

namespace App\Services\Masters;

use App\Repositories\Masters\ToDo\ToDoRepository;

class ToDoService
{
    public function __construct(private ToDoRepository $toDoRepository) {}

    public function dataToDo($data)
    {
        return $this->toDoRepository->getAllToDos($data);
    }

    public function StoreToDo($data)
    {
        return $this->toDoRepository->createToDo([
            'description' => $data['description'],
        ]);
    }

    public function updateToDo($data): bool
    {
        return $this->toDoRepository->updateToDoById([
            'description' => $data['description'],
        ], $data['id']);
    }

    public function deleteToDo($data)
    {
        return $this->toDoRepository->deleteToDoById($data['id']);
    }

    public function getToDo($data)
    {
        return $this->toDoRepository->getToDoById($data['id']);
    }
}
