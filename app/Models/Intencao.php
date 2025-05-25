<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intencao extends Model
{
        protected $table = 'intencao';

        protected $primaryKey = 'cod_intencao';

        public $timestamps = false;

        protected $fillable = [
            'descricao',
        ];
}
