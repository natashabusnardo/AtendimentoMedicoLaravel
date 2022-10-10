<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class medico_has_especialidade extends Model
{
    use HasFactory;

    protected $fillable = ['medico_id', 'especialidade_id'];
}