<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            [
                8796,
                'Emanuelly Alice Alessandra de Paula',
                '96446953722',
                'emanuellyalice@ecompleto.com.br',
                'F',
                '1988-01-18',
                90
            ],

            [
                5789,
                'Renato Ryan Lopes',
                '78891957615',
                'renato_ryan@ecompleto.com.br',
                'F',
                '1947-02-08',
                92
            ],

            [
                6748,
                'Kauê Bryan Souza',
                '55782338806',
                'kauesouza@ecompleto.com.br',
                'F',
                '1945-06-27',
                90
            ],

            [
                6872,
                'Samuel Emanuel Castro',
                '85673855800',
                'samuel.castro@ecompleto.com.br',
                'F',
                '1988-11-05',
                115
            ],

            [
                6716,
                'Raquel Nicole Moura',
                '36118844720',
                'raquelnicole_moura@ecompleto.com.br',
                'F',
                '1990-02-20',
                98
            ],

            [
                4802,
                'Fernando Julio Ramos',
                '20499776461',
                'fernando_julio99@ecompleto.com.br',
                'F',
                '1999-09-11',
                97
            ],

            [
                9484,
                'Kevin Yuri Pedro Lopes',
                '95829123088',
                'kevinpedro@ecompleto.com.br',
                'F',
                '1996-06-03',
                94
            ],

            [
                1830,
                'Thales André Pereira',
                '13440817709',
                'samuel.castro@ecompleto.com.br',
                'F',
                '1995-04-07',
                90
            ],

            [
                2280,
                'Heloisa Valentina Fabiana Moura',
                '99386767660',
                'heloisavalentina@ecompleto.com.br',
                'F',
                '1984-12-12',
                92
            ]
        ];

        foreach($clientes as $cliente) {
            Clientes::create([
                "id" => $cliente[0],
                "nome" => $cliente[1],
                "cpf_cnpj" => $cliente[2],
                "email" => $cliente[3],
                "tipo_pessoa" => $cliente[4],
                "data_nasc" => $cliente[5],
                "id_loja" => $cliente[6]
            ]);
        }
    }
}
