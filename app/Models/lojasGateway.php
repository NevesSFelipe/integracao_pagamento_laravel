<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lojasGateway extends Model
{
    use HasFactory;

    protected $table = 'lojas_gateway';

    protected $fillable = [
        'id',
        'id_loja',
        'id_gateway'
    ];
}
