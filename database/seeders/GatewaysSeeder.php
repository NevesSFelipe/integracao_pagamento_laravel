<?php

namespace Database\Seeders;

use App\Models\Gateway;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GatewaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gateways = [
            
            array(1,'PAGCOMPLETO','https://api11.ecompleto.com.br/'),
            array(2,'CIELO','https://api.cielo.com.br/v1/transactions/'),
            array(3,'PAGSEGURO','https://api.pagseguro.com.br/transactions/')

        ];

        foreach($gateways as $empresa) {
            Gateway::create([
                "id" => $empresa[0],
                "descricao" => $empresa[1],
                "endpoint" => $empresa[2]
            ]);
        }
    }
}
