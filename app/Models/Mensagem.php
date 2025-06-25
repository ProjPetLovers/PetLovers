<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mensagem extends Model
{
    use HasFactory;

    protected $table = 'mensagem';

    protected $primaryKey = 'id_mensagem';

    public $timestamps = false; // A tabela não possui created_at e updated_at

    protected $fillable = [
        'id_conexao',
        'destinatario_id',
        'remetente_id',
        'conteudo',
        'criado_em',
        'lido_em',
    ];

    protected $casts = [
        'criado_em' => 'datetime',
        'lido_em' => 'datetime',
    ]; // criado e lido são strings, é util para poder manipular datas e formatação no controller ou views

    public function conexao()
    {
        return $this->belongsTo(Conexao::class, 'id_conexao', 'id_conexao');
    }

    public function remetente()
    {
        return $this->belongsTo(User::class, 'remetente_id', 'id');
    }

    public function destinatario()
    {
        return $this->belongsTo(User::class, 'destinatario_id', 'id');
    }
}
