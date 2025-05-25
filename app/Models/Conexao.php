<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conexao extends Model
{
    use HasFactory;

    protected $table = 'conexao',

    protected $primaryKey = 'id_conexao';

    protected $fillable = [
        'usuario1_id',
        'usuario2_id',
        'pedido_em',
        'status'

    public function usuario1(){
         return $this->belongsTo(User::class, 'usuario1_id', 'id');
            }
    public function usuario2(){
         return $this->belongsTo(User::class, 'usuario2_id', 'id');
    }








    ]
}
