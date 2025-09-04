<?php


class ShoppingCart
{
    public $products;
    public $cartShop = [];


    public function __construct()
    {
        $this->products = [
            ['id' => 1,
            'name' => 'Camiseta',
            'price' => 59.90,
            'stock' => 10],


            ['id' => 2,
            'name' => 'Calça Jeans',
            'price' => 129.90,
            'stock' => 5],


            ['id' => 3,
            'name' => 'Tênis',
            'price' => 199.90,
            'stock' => 3]
        ];
    }


    public function showProducts(): void
    {
        echo "Produtos disponíveis:\n";
        foreach ($this->products as $product) {
            echo "- ID {$product['id']} | {$product['name']} | R$ {$product['price']} | stock: {$product['stock']}\n";
        }
        echo ' ';
    }


    public function Add(int $id, int $amount): void
    {
        foreach ($this->products as &$product) {
            if ($product['id'] === $id) {
                if ($product['stock'] < $amount) {
                    echo "Não foi possivel adicionar ao carrinho. O {$product['name']} tem apenas {$product['stock']} unidades.\n";
                    return;
                }


                if ($product['stock'] == 0) {
                    echo "Produto esgotado!\n";
                    return;
                }


                $this->cartShop[] = [
                    'id_produto' => $id,
                    'quantidade' => $amount,
                    'subtotal' => $product['price'] * $amount
                ];


                $product['stock'] -= $amount;
                echo "{$product['name']} adicionado ao carrinho ({$amount} un).\n";
                return;
            }
        }


        echo " Produto não encontrado.\n";
    }
}




$p = new ShoppingCart();
$p->showProducts();      
$p->add(1, 2);        
$p->add(3, 3);        
$p->showProducts();      