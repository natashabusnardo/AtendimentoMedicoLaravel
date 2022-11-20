<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atendimento extends Model
{
    use HasFactory;

    protected $fillable = ['paciente_id', 'medico_id', 'gravidade', 'cid_id', 'descricao'];

}
