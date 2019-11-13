<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Jogadore;

class Posicoe extends Model
{
    use SoftDeletes;

    public function jogadores(){
        $this->hasMany(Jogadore::class);
    }
}
