<?php

namespace App\Livewire\Layouts\Ecomm;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Orders;
use App\Models\Testes;
use Livewire\Component;
use App\Models\Orderitems;
use Stripe\Checkout\Session;
use App\Models\GruposDeTestes;
use Livewire\Attributes\Title;
use App\Helpers\GerenciarCarrinho;
use App\Models\Orderclientdetails;

#[Title('SOBRARE | Neurodiversidade | Finalizar Compra')]
class CheckoutPage extends Component
{
    
    public $nome;
    public $sobrenome;
    public $telefone;
    public $endereco;
    public $cidade;
    public $estado;
    public $cep;
    public $forma_pagamento;
    
    public function mount() {
        $cart_items = GerenciarCarrinho::getCartItemsFromCookie();
        if(count($cart_items) == 0) {
            return redirect()->route('neurodiv');
        }
    }

    public function confirmarPedido(){
        
        // Validação de todos os campos do formulário de dados pessoais do cliente
        // antes de prosseguir com a preparação e processamento do pedido.
        $this->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'forma_pagamento' => 'required',
        ],
        [
            'nome.required' => 'Preencha o seu Nome',
            'sobrenome.required' => 'Preencha o seu Sobrenome',
            'telefone' => 'Preencha o telefone com DDD',
            'endereco' => 'Preencha endereço de cobrança completo',
            'cidade' => 'Informe a Cidade',
            'estado' => 'Selecione o Estado (UF)',
            'cep' => 'Informe o CEP',
            'forma_pagamento' => 'Selecione a Forma de Pagamento',
        ]);

        
        $cart_items = GerenciarCarrinho::getCartItemsFromCookie();

        $line_items = [];

        foreach($cart_items as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'BRL',
                    'unit_amount' => $item['precoGrupo']*100,
                    'product_data' => [
                        'name' => $item['nomeGrupo'],
                    ]
                    ],
                'quantity' => $item['quantidade'],
            ];

        }

        // Preparação para inclusão da tabela de Pedidos. Somente após confirmação do pagamento.
        $order = new Orders();
        $order->user_id = auth()->user()->id;
        $order->orderDate = Carbon::now();
        $order->grand_total = GerenciarCarrinho::calcularTotalGeral($cart_items);
        $order->paymentMethod = $this->forma_pagamento;
        $order->paymentStatus = 'pendente';
        $order->orderStatus = 'novo';

        // Preparação para inclusão da tabela de Endereço
        $detalhesCliente = new Orderclientdetails();
        $detalhesCliente->firstName = $this->nome;
        $detalhesCliente->lastName = $this->sobrenome;
        $detalhesCliente->phone = $this->telefone;
        $detalhesCliente->cobranca_cep = $this->cep;
        $detalhesCliente->cobranca_rua = $this->endereco;
        $detalhesCliente->cobranca_cidade = $this->cidade;
        $detalhesCliente->cobranca_estado = $this->estado;

        $redirect_url = '';

        if($this->forma_pagamento == 'stripe') {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $sessionCheckout = Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => auth()->user()->email,
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('success').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel'),
            ]);

            $redirect_url = $sessionCheckout->url;
        } else {
            $redirect_url = route('success');
        }

        $order->save();
        $detalhesCliente->orders_id = $order->id;
        $detalhesCliente->save();

        //Gerar os testes de cada grupo como itens do pedido
        foreach ($cart_items as $grupo) {
            $testesDoGrupo = GruposDeTestes::with('testes')->where('codGrupo', $grupo['codGrupo'])->first();
            //dd($testesDoGrupo);
            $getOrderItems = Orderitems::where('orders_id', $order->id)->get();
            //dd($getOrderItems);
            if(count($getOrderItems) == 0) {
                // Não importa o grupo de teste que o cliente comprou, por definição da SOBRARE,
                // o primeiro teste tem que ser Histórico do corpo...
                $historicoCorpo = Testes::where('codTeste', '01-HstCrpEnrdvrgc')->first();
                $firstOrderItem = new Orderitems();
                $firstOrderItem->orders_id = $order->id;
                $firstOrderItem->testes_id = $historicoCorpo->id;
                $firstOrderItem->codTeste = '01-HstCrpEnrdvrgc';
                $firstOrderItem->unitPrice = $historicoCorpo->precoTeste;
                $firstOrderItem->quantity = 1;
                $firstOrderItem->itemTotal = $historicoCorpo->precoTeste;
                $firstOrderItem->testeStatus = 'novo';
                $firstOrderItem->save();
            }

            foreach ($testesDoGrupo->testes as $teste) {
                if($teste->codTeste != '01-HstCrpEnrdvrgc') {
                    $orderItem = new Orderitems();
                    $orderItem->orders_id = $order->id;
                    $orderItem->testes_id = $teste->id;
                    $orderItem->codTeste = $teste->codTeste;
                    $orderItem->unitPrice = $teste->precoTeste;
                    $orderItem->quantity = 1;
                    $orderItem->itemTotal = $teste->precoTeste;
                    $orderItem->testeStatus = 'novo';
                    $orderItem->save();
                }
            }
        }

        GerenciarCarrinho::clearCartItems();

        return redirect($redirect_url);

        // A definição abaixo está aguardando confirmar os campos
        // necessários para processamento pelo Stripe.
        /* $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('phone')->nullable();
            $table->string('cobranca_cep');
            $table->string('cobranca_rua')->nullable();
            $table->string('cobranca_numero')->nullable();
            $table->string('cobranca_complemento')->nullable();
            $table->string('cobranca_bairro')->nullable();
            $table->string('cobranca_cidade')->nullable();
            $table->string('cobranca_estado')->nullable();
            $table->string('cobranca_pais')->nullable();
            $table->string('cobranca_tax_id')->nullable(); */


    }
    
    public function render()
    {
        $cart_items = GerenciarCarrinho::getCartItemsFromCookie();
        $total_geral = GerenciarCarrinho::calcularTotalGeral($cart_items);
        return view('livewire.layouts.ecomm.checkout-page', [
            'cart_items' => $cart_items,
            'total_geral' => $total_geral
        ]);
    }
}
