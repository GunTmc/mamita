<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Masters\EditChildRequest;
use App\Http\Requests\Masters\UpdateChildRequest;
use App\Services\Masters\ChildService;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function __construct(private ChildService $child) {}
    public function index()
    {
        return view('masters.indexChildren', [
            'children' => $this->child->dataChild([])->get(),
            'title' => 'Perhembangan Anak'
        ]);
    }

    public function edit(EditChildRequest $editChildRequest)
    {
        $request =  $editChildRequest->validated();
        return view('masters.editChild', [
            'child' => $this->child->getChild($request)
        ]);
    }

    public function update(UpdateChildRequest $updateChildRequest)
    {
        $request = $updateChildRequest->validated();
        $this->child->updateChild($request);
        return redirect()->route('child.index');
    }
}
