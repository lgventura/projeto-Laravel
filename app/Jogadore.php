<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Time;
use App\Posicoe;

class Jogadore extends Model
{
  use SoftDeletes;
  protected $fillable = ['nome', 'numero', 'd_nasc', 'pais', 'altura', 'peso', 'posicoes_id', 'times_id'];
  
  public function times(){
    return $this->belongsTo(Time::class, 'times_id', 'id');
  }

  public function posicoes(){
    return $this->belongsTo(Posicoe::class, 'posicoes_id', 'id');
  }
}
