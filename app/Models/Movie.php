<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
        // Permitir a atribuição em massa para esses campos
        protected $fillable = [
            'name', 'sinopse', 'ano', 'categoria', 'capa', 'link',
        ];
    
        // Definir o nome da tabela se for diferente do nome padrão pluralizado
        protected $table = 'filmes';
}
