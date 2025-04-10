<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Child extends Model
{
    use HasUuids;
    protected $table = 'children';

    protected $guarded = [];
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'source_id', 'id');
    }
}
