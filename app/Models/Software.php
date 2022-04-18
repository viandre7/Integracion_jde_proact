<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;
    protected $table = "software";
    protected $fillable = ['placa', 'nserie', 'proceso', 'tipo_equipo','modelo', 'usuario'];
}
