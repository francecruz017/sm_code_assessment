<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class User extends Model
{
    use HasFactory;

    public function getAgeAttribute()
    {
        $birthdate = Carbon::createFromFormat('Y-m-d', $this->attributes['birthdate']);
        return $birthdate->diffInYears(Carbon::now());
    }
}
