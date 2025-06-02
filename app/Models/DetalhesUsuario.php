<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Models;

class DetalhesUsuario extends Model
{
    /* @use HasFactory<\Database\Factories\UserFactory> */
        use HasFactory;

        protected $table = 'detalhes_usuario';

        protected $fillable = [
            'nome',
            'apelido',
            'bio',
            'foto',
            'data_nascimento',
            'localizacao',
            'cod_intencao',
            'photo_fundo',
            'id_detalhes_usuario'

        ];

        public function user(){
            return $this->belongsTo(User::class, 'id_detalhes_usuario');
        }
        public function cod_intencao(){
            return $this->belongsTo(Intencao::class, 'cod_intencao');
        }
    }










