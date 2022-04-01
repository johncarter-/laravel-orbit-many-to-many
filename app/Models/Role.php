<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Role extends Model
{
    use HasFactory, Orbital;

    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->string('name');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->using(RoleUser::class);
    }
}
