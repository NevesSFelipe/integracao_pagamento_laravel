<?php

namespace Database\Seeders;

use App\Models\pedidosPagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PedidosPagamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedidos_pagamentos = [

            array(103013,98302,3,4,null,null,'5236387041984690','Elisa Adriana Barbosa','319','2022-08'),
            array(103014,98303,3,2,null,null,'5372472213342610','Renato Ryan','848','2022-03'),
            array(103015,98304,1,1,null,null,null,null,null,null),
            array(103016,98305,2,1,null,null,null,null,null,null),
            array(103017,98306,3,1,null,null,'4929521310619600','Raquel Moura','721','2023-03'),
            array(103018,98307,3,1,null,null,'4275824466404380','Fernando Julio','482','2022-05'),
            array(103019,98308,3,5,null,null,'5167913943407160','Kevin Pedro','441','2022-10'),
            array(103020,98309,2,1,null,null,null,null,null,null),
            array(103021,98310,1,1,null,null,null,null,null,null)
        
        ];

        foreach($pedidos_pagamentos as $pdp) {
            pedidosPagamento::create([
                "id" => $pdp[0],
                "id_pedido" => $pdp[1],
                "id_formapagto" => $pdp[2],
                "qtd_parcelas" => $pdp[3],
                "retorno_intermediador" => $pdp[4],
                "data_processamento" => $pdp[5],
                "num_cartao" => $pdp[6],
                "nome_portador" => $pdp[7],
                "codigo_verificacao" => $pdp[8],
                "vencimento" => $pdp[9]
            ]);
        }
    }
}
