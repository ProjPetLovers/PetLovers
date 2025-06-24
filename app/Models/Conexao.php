<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conexao extends Model
{
    use HasFactory;

    protected $table = 'conexao';

    protected $primaryKey = 'id_conexao';
    public $timestamps = false;

    protected $fillable = [
        'usuario1_id',
        'usuario2_id',
        'pedido_em',
        'status'
    ];

    public function usuario1()
    {
        return $this->belongsTo(User::class, 'usuario1_id', 'id');
    }
    public function usuario2()
    {
        return $this->belongsTo(User::class, 'usuario2_id', 'id');
    }

    public function usuarioConexao($id)
    {
        $user = User::findOrFail($id);
        // ...seu código...

        $conexao = null;
        if (auth()->check() && auth()->id() != $user->id) {
            $conexao = Conexao::where(function ($q) use ($user) {
                $q->where('usuario1_id', auth()->id())
                    ->where('usuario2_id', $user->id);
            })
                ->orWhere(function ($q) use ($user) {
                    $q->where('usuario1_id', $user->id)
                        ->where('usuario2_id', auth()->id());
                })
                ->first();
        }

        return view('usuario_conexao', compact('user', 'userData', 'intencao', 'petsData', 'conexao'));
    }
}
