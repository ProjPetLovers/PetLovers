<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocializaCom extends Model
{
        protected $table = 'socializa_com';

        protected $primaryKey = 'cod_socializa';

        public $timestamps = false;

        protected $fillable = [
            'descricao',
        ];
}
