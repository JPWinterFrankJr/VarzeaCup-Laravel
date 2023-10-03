<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidas extends Model
{
    protected $table = 'vc_partidas'; // Nome da tabela correspondente no banco de dados
    protected $fillable = [
        'id', 'data_partida1', 'data_partida2',
        'time1_gols1', 'time2_gols1', 'time1_gols2',
        'time2_gols2', 'time1_id', 'time2_id'
    ]; // Campos que podem ser preenchidos em massa}






}








