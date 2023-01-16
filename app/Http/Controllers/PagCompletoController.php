<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PagCompletoController extends Controller
{
    private string $endpoint = 'https://api11.ecompleto.com.br/exams/processTransaction?accessToken=';
    private string $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdG9yZUlkIjoiNCIsInVzZXJJZCI6IjkwNDAiLCJpYXQiOjE2NzM2MzcwMTUsImV4cCI6MTY3NDI2OTk5OX0.es5E5C2NYWlXcUwmHTAcE_AWkqwjHfhzy6q-IrEd6SE';
    
    public function index()
    {
        $sql = 
            DB::table('lojas_gateway AS lj')
            ->join('pedidos AS pd', 'pd.id_loja', '=', 'lj.id_loja')
            ->join('pedidos_pagamentos AS pdp', 'pdp.id_pedido', '=', 'pd.id')
            ->join('clientes AS cl', 'cl.id', '=', 'pd.id_cliente')
            ->select('pd.valor_total', 'pdp.*', 'cl.id as id_cliente', 'cl.nome', 'cl.tipo_pessoa AS tipo_pessoa', 'cl.email', 'cl.cpf_cnpj', 'cl.data_nasc')
            ->where('lj.id_gateway', '=', 1)
            ->where('pdp.id_formapagto', '=', 3)
            ->get()
        ;

        foreach ($sql as $row) {
            $body = [
                'external_order_id' => $row->id_pedido,
                'amount' => floatval($row->valor_total),
                'card_number' => $row->num_cartao,
                'card_cvv' => strval($row->codigo_verificacao),
                'card_expiration_date' => $this->format_date($row->vencimento),
                'card_holder_name' => $row->nome_portador,
                'customer' => [
                    'external_id' => strval($row->id_cliente),
                    'name' => $row->nome,
                    'type' => $this->format_person_type($row->tipo_pessoa),
                    'email' => $row->email,
                    'documents' => [
                        'type' => $this->set_type_person($row->cpf_cnpj),
                        'number' => $row->cpf_cnpj,
                    ],
                    'birthday' => $row->data_nasc,
                ],
            ];

            $return_api = Http::withBody(
                json_encode($body), 'json'
            )->post($this->endpoint . $this->token);

            $this->update_order_status($row->id_pedido, $return_api);
            $this->update_intermediate_return($row->id_pedido, $return_api);
    
        }
    }

    private function update_order_status(int $id_pedido, string $return_api)
    {
        $array_return_api = json_decode($return_api, true);
        
        if(!$array_return_api['Error']) {

            if($array_return_api['Transaction_code'] == '00') {
                $sql = 
                    DB::table('pedidos')
                    ->where("id", "$id_pedido")
                    ->update(["id_situacao" => 1])
                ;
            }

            if(
                $array_return_api['Transaction_code'] == '02' || 
                $array_return_api['Transaction_code'] == '03' || 
                $array_return_api['Transaction_code'] == '04'
            ) { 
                $sql = 
                    DB::table('pedidos')
                    ->where("id", "$id_pedido")
                    ->update(["id_situacao" => 3])
                ;
            }
        }
    }

    private function update_intermediate_return(int $id_pedido, string $return_api)
    {
        $array_return_api = json_decode($return_api, true);

        if(!$array_return_api['Error']) {

            $sql = 
                DB::table('pedidos_pagamentos')
                ->where("id", "$id_pedido")
                ->update(
                    ["retorno_intermediador" => $array_return_api['Transaction_code'] . " - " . $array_return_api['Message']],
                    ["data_processamento" => date('d-m-Y')]
                )
            ;
        }
    }

    private function format_person_type(string $tipo_pessoa)
    {
        if($tipo_pessoa == 'F') {
            return 'Individual';
        }

        return 'Corporation';
    }

    private function format_date(string $old_card_expiration_date)
    {
        $dismantled_date = explode('-', $old_card_expiration_date);

        $year = $dismantled_date[0];
        $year = substr($year, 2);

        $day = $dismantled_date[1];

        return $day . $year;
    }

    private function set_type_person(string $cpf_cnpj_rh)
    {
        if (strlen($cpf_cnpj_rh) == 11 || strlen($cpf_cnpj_rh) == 14) {
            return 'cpf';
        }

        return 'rg';
    }
}
