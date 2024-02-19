<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Village;

class Mandal extends Model
{
    use HasFactory;

    public function villages(){

        return $this->hasMany(Village::class);
    }
}
