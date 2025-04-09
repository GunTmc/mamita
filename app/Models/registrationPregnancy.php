<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class registrationPregnancy extends Model
{
    use HasUuids;
    protected $table = 'registrations_pregnancies';

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
}
