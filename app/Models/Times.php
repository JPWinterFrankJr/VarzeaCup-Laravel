<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    protected $table = 'vc_times'; // Nome da tabela correspondente no banco de dados
    protected $fillable = ['id','name']; // Campos que podem ser preenchidos em massa
}
