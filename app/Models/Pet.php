<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pet extends Model
{
    use HasFactory;

      // Definir o nome da tabela
        protected $table = 'pet';

        protected $primaryKey = 'id_pet';

        public $timestamps = false;

        protected $fillable = [
            'usuario_id',
            'nome',
            'especie',
            'raca',
            'sexo',
            'peso',
            'data_nascimento',
            'castrado',
            'cod_socializa',
            'foto',
            'bio'
        ];

        //conversao de dados
        protected $casts = [
            'castrado' => 'boolean',
            'data_nascimento' => 'date',
            'peso' => 'decimal:2'
        ];

        public function usuario()
        {
            return $this->belongsTo(User::class, 'usuario_id', 'id');
        }

        // Relacionamento com a tabela 'socializa_com'
        public function socializaCom()
        {
            return $this->belongsTo(SocializaCom::class, 'cod_socializa', 'cod_socializa');
        }

}
