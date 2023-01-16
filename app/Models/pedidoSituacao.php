<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidoSituacao extends Model
{
    use HasFactory;

    protected $table = 'pedido_situacao';

    protected $fillable = [
        'id',
        'descricao'
    ];
}
