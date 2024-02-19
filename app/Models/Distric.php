<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Mandal;

class Distric extends Model

{
    use HasFactory;

    public function mandals(){

            return $this->hasMany(Mandal::class,'districts_id','id');
    }
}
