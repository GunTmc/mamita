<?php

namespace App\Repositories\Registrations;

use App\Models\RegistrationChild;

class RegistrationChildRepository
{
    public function createRegistrationChild($data)
    {
        return RegistrationChild::create($data);
    }

    public function updateRegistrationChildById($id, $data)
    {
        return RegistrationChild::where('id', $id)->update($data);
    }

    public function deleteRegistrationChildById($id)
    {
        return RegistrationChild::where('id', $id)->delete();
    }

    public function getRegistrationChild($id)
    {
        return RegistrationChild::where('id', $id)->first();
    }

    public function getAllRegistrationChildrenByUserId($id)
    {
        return  RegistrationChild::where('user_id', $id)->get();
    }
}
