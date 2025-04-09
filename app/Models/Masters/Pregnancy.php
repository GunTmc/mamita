<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Pregnancy extends Model
{
    use HasUuids;
    protected $table = 'pregnancies';
    protected $guarded = [];


    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
}
