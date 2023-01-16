<?php

namespace Database\Seeders;

use App\Models\formasPagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormasPagamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formas_pagamento = [
            [
                1,
                'Boleto Bancário'
            ],

            [
                2,
                'Depósito Bancário'
            
            ],

            [
                3,
                'Cartão de Crédito'
            ]
        ];

        foreach($formas_pagamento as $pgto) {
            formasPagamento::create([
                "id" => $pgto[0],
                "descricao" => $pgto[1]
            ]);
        }
    }
}
