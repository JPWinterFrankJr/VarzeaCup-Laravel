<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Usuarios extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'vc_usuarios'; // Nome da tabela correspondente no banco de dados
    protected $fillable = ['id','nome','email','password']; // Campos que podem ser preenchidos em massa
    
    // Métodos necessários da interface Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id'; // O nome do campo de identificação (geralmente 'id')
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // O valor do campo de identificação (geralmente 'id')
    }

    public function getAuthPassword()
    {
        return $this->password; // O campo de senha do usuário
    }

}
