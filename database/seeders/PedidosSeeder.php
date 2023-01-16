<?php

namespace Database\Seeders;

use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedidos = [

            array(98302,250.74,33.4,'2021-08-20 00:00:00',8796,90,1),
            array(98303,583.92,57.85,'2021-08-23 00:00:00',5789,92,1),
            array(98304,97.25,17.5,'2021-08-23 00:00:00',6748,90,2),
            array(98305,66.89,22.55,'2021-08-25 00:00:00',6872,115,2),
            array(98306,115.9,19.5,'2021-08-25 00:00:00',6716,98,1),
            array(98307,153.72,25.5,'2021-08-25 00:00:00',4802,97,1),
            array(98308,87.9,13.5,'2021-08-26 00:00:00',9484,94,1),
            array(98309,223.9,28.75,'2021-08-27 00:00:00',1830,90,2),
            array(98310,58.9,19.85,'2021-08-27 00:00:00',2280,92,1)

        ];

        foreach($pedidos as $pedido) {
            Pedido::create([
                "id" => $pedido[0],
                "valor_total" => $pedido[1],
                "valor_frete" => $pedido[2],
                "data" => $pedido[3],
                "id_cliente" => $pedido[4],
                "id_loja" => $pedido[5],
                "id_situacao" => $pedido[6],
            ]);
        }
    }
}
