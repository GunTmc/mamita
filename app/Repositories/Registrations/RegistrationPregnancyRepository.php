<?php

namespace App\Repositories\Registrations;

use App\Models\RegistrationPregnancy;

class RegistrationPregnancyRepository
{
    public function createRegistrationPregnancy($data)
    {
        return RegistrationPregnancy::create($data);
    }

    public function updateRegistrationPregnancyById($id, $data)
    {
        return RegistrationPregnancy::where('id', $id)->update($data);
    }

    public function deleteRegistrationPregnancyById($id)
    {
        return RegistrationPregnancy::where('id', $id)->delete();
    }

    public function getRegistrationPregnancy($id)
    {
        return RegistrationPregnancy::where('id', $id)->first();
    }

    public function getAllRegistrationPregnancyByUserId($id)
    {
        return  RegistrationPregnancy::where('user_id', $id)->get();
    }
    public function getAllRegistrationPregnancy()
    {
        return  RegistrationPregnancy::orderBy('created_at', 'desc')->get();
    }
}
