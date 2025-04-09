<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Masters\ChildService;

class ChildController extends Controller
{
    public function __construct(private ChildService $child) {}
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'success get child',
            'data' => $this->child->dataChild([])->get()->map(function ($child) {
                return [
                    'id' => $child->id,
                    'age' => $child->age,
                    'note' => $child->note,
                    'vaccine' => $child->vaccine,
                    'headCircumference' => $child->head_circumference,
                    'weight' => $child->weight,
                    'height' => $child->height,
                ];
            })->toArray(),
        ]);
    }
}
