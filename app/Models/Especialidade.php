<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    public function especialidades(){
        return $this->belongsToMany('App\Models\Medico', 'medico_has_especialidade');
    }
}
