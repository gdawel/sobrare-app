<?php

namespace App\Helpers;

use App\Models\GruposDeTestes;
use Illuminate\Support\Facades\Cookie;


class GerenciarCarrinho {

   

// Adicionar um item ao Carrinho
static public function addItemToCart( $produto_id ) {
    $cart_items = self::getCartItemsFromCookie();

    $item_existe = null;

    foreach ($cart_items as $key => $item) {
        if($item['produto_id'] == $produto_id) {
            $item_existe = $key;
            break;
        }
    }

    if ($item_existe !== null) {
        // verificar como será tratado quando o item existir
        
    } else {
        $grupo = GruposDeTestes::where('id', $produto_id)->first(['id', 'nomeGrupo', 'precoGrupo', 'imagemGrupo']);
        if ($grupo) {
            $cart_items[] = [
                'produto_id' => $produto_id,
                'nomeGrupo' => $grupo->nomeGrupo,
                'imagemGrupo' => $grupo->imagemGrupo,
                'quantidade' => 1,
                'precoGrupo' => $grupo->precoGrupo,
                'total_item' => $grupo->precoGrupo
            ];
        }
    }
    self::addCartItemsToCookie($cart_items);
    return count($cart_items);
}

// Remover um item do Carrinho
static public function removeCartItem( $produto_id ) {
    $cart_items = self::getCartItemsFromCookie();

    foreach ($cart_items as $key => $item) {
        if( $item['produto_id'] == $produto_id) {
            unset($cart_items[$key]);
        }
    }
    self::addCartItemsToCookie($cart_items);
    //dd($cart_items);
    return $cart_items;
}

// Adicionar os items do Carrinho ao Cookie
static public function addCartItemsToCookie( $cart_items ) {
    Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
}

// Limpar os itens do Carrinho do Cookie
static public function clearCartItems() {
    Cookie::queue(Cookie::forget('cart_items'));
}

// Recuperar todos os itens do carrinho à partir do Cookie
static public function getCartItemsFromCookie() {
    $cart_items = json_decode(Cookie::get('cart_items'), true);
    if(!$cart_items) {
        $cart_items = [];
    }
    return $cart_items;
}

// Calcular o Total Geral do Pedido
static public function calcularTotalGeral($items) {
    return array_sum(array_column($items, 'total_item'));

}

}