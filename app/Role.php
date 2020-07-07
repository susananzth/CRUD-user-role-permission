<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Indicador de que el modelo Role esta unido a el modelo User en una realcion de muchos a muchos.
    public function users(){
      return $this->belongsToMany('App\User');
    }
}
