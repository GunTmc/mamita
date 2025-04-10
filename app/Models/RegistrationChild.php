<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class RegistrationChild extends Model
{
    use HasUuids;
    protected $table = 'registrations_children';

    protected $guarded = [];

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
}
