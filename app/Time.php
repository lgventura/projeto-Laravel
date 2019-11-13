<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Jogadore;

class Time extends Model
{
  use SoftDeletes;
  protected $fillable = ['nome', 'ano_fundacao', 'cidade', 'uf', 'abreviado'];
 
  public function jogadores(){
    $this->hasMany(Jogadore::class);
  }

}
