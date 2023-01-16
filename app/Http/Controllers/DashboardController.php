<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $awaiting_payment = $this->show_orders_by_status(1);
        $identified_payment = $this->show_orders_by_status(2);
        $canceled_order = $this->show_orders_by_status(3);
        return view('pagCompleto.index', compact('awaiting_payment', 'identified_payment', 'canceled_order'));
    }

    private function show_orders_by_status(int $id_situacao)
    {
        $sql = 
            DB::table('pedidos AS pd')
            ->join('pedidos_pagamentos AS pdp', 'pdp.id_pedido', '=', 'pd.id')
            ->join('formas_pagamentos AS pgto', 'pgto.id', '=', 'pdp.id_formapagto')
            ->join('pedido_situacao AS ps', 'ps.id', '=', 'pd.id_situacao')
            ->join('lojas_gateway AS lj', 'lj.id_loja', '=', 'pd.id_loja')
            ->join('gateways AS gt', 'gt.id', '=', 'lj.id_gateway')



            ->select('pd.id', 'gt.descricao AS gateway', 'pd.id_loja', 'pgto.descricao AS forma_pagamento', 'ps.descricao AS situacao', 'pdp.retorno_intermediador', 'pdp.data_processamento')
            ->where('ps.id', '=', $id_situacao)
            ->orderBy('gt.descricao', 'asc')
            ->get()
        ;

        $table = '';
        $table .= 
            '<table class="table text-center table-striped table-bordered">' .
                '<thead class="thead-dark">' .
                    '<tr>' .
                        '<th scope="col">#</th>' .
                        '<th scope="col">Gateway</th>' .
                        '<th scope="col">Loja</th>' .
                        '<th scope="col">Forma Pgto.</th>' .
                        '<th scope="col">Situação</th>' .
                        '<th scope="col">Retorno</th>' .
                        '<th scope="col">Dt. Processamento</th>' .
                    '</tr>' .
                '</thead>'
        ;

        foreach ($sql as $itens) {
            $table .= 
                '<tbody>' .
                    '<tr>' .
                        '<th scope="row">' . $itens->id . '</th>' .
                        '<td>' . $itens->gateway . '</td>' .
                        '<td>' . $itens->id_loja . '</td>' .
                        '<td>' . $itens->forma_pagamento . '</td>' .
                        '<td>' . $itens->situacao . '</td>' .
                        '<td>' . $itens->retorno_intermediador . '</td>' .
                        '<td>' . $itens->data_processamento . '</td>' .
                    '</tr>' .
                '</tbody>'
            ;
        }

        $table .= '</table>';

        return $table;
    }
}