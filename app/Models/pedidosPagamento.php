<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidosPagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_pedido',
        'id_formapagto',
        'qtd_parcelas',
        'retorno_intermediador',
        'data_processamento',
        'num_cartao',
        'nome_portador',
        'codigo_verificacao',
        'vencimento'
    ];
}
