<?php

namespace Database\Seeders;

use App\Models\pedidoSituacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoSituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedido_situacao = [

            array(1,'Aguardando Pagamento'),
            array(2,'Pagamento Identificado'),
            array(3,'Pedido Cancelado')

        ];

        foreach($pedido_situacao as $pds) {
            pedidoSituacao::create([
                "id" => $pds[0],
                "descricao" => $pds[1]
            ]);
        }
    }
}
