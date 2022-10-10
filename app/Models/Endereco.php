<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['paciente_id', 'endereco', 'numero',
                            'cep', 'bairro', 'complemento', 'cidade_id'];

    public function paciente (){
        return $this->belongsTo ('App\Models\Paciente');
    }
    public function cidade(){
        return $this->belongsTo ('App\Models\Cidade');
    }
}
