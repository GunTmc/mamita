<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class UserToDo extends Model
{
    use HasUuids;

    protected $table = 'user_to_dos';
    protected $guarded = [];

    public function newUniqueId()
    {
        return Uuid::uuid4();
    }
}
