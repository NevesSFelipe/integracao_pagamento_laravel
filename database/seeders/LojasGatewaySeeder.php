<?php

namespace Database\Seeders;

use App\Models\lojasGateway;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LojasGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lojas_gateway = [
            
            array(1,90,1),
            array(2,92,2),
            array(3,115,1),
            array(4,98,1),
            array(5,97,1),
            array(6,94,1)

        ];

        foreach($lojas_gateway as $lj_gateway) {
            lojasGateway::create([
                "id" => $lj_gateway[0],
                "id_loja" => $lj_gateway[1],
                "id_gateway" => $lj_gateway[2]
            ]);
        }
    }
}
