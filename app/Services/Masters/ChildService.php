<?php

namespace App\Services\Masters;

use App\Repositories\Masters\Children\ChildRepository;

class ChildService
{
    public function __construct(private ChildRepository $childRepository) {}

    public function dataChild($data)
    {
        return $this->childRepository->getAllChildren($data);
    }

    public function getChild($data)
    {
        return $this->childRepository->getChildById($data['id']);
    }

    public function updateChild($data)
    {
        return $this->childRepository->updateChildById([
            'age' => $data['age'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'note' => $data['note'],
            'head_circumference' => $data['headCircumference'],
            'vaccine' => $data['vaccine'],
        ], $data['id']);
    }
}
