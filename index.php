<?php

class ShoppingCart
{
    public $products;
    public $cart = [];


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


    public function Add(int $id, int $quantity): void
    {
        foreach ($this->products as &$product) {
            if ($product['id'] === $id) {
                if ($product['stock'] < $quantity) {
                    echo "Não foi possivel adicionar ao carrinho. O {$product['name']} tem apenas {$product['stock']} unidades.\n";
                    return;
                }


                if ($product['stock'] == 0) {
                    echo "Produto esgotado!\n";
                    return;
                }


                $this->cart[] = [
                    'product_id' => $id,
                    'name' => $product['name'],
                    'quantity' => $quantity,
                    'subtotal' => $product['price'] * $quantity
                ];


                $product['stock'] -= $quantity;
                echo "{$product['name']} adicionado ao carrinho ({$quantity} un).\n";
                return;
            }
        }


        echo " Produto não encontrado.\n";
    }

    public function itemsExists(int $id): bool 
    {
        foreach ($this->cart as $item) {
            if ($item['product_id'] === $id) 
            {
                return true;
            }
        }

        return false;

    }

    public function removeProduct(int $id): void 
    {
        if (!$this->itemsExists($id)) 
        {
            echo "Produto não encontrado no carrinho. \n";
            return;
        }

        foreach ($this->cart as $key => $item)
        {
            if ($item['product_id'] === $id)
            {
                foreach ($this->products as &$product) {
                    if ($product['id'] === $id) {
                        $product['stock'] += $item['quantity'];
                        break;
                    }
                }

                unset($this->cart[$key]);
                echo "Produto ID {$id} removido do carrinho e estoque atualizado. \n";
                return;

            }
        }      

    }

    public function showCart(): void 
    {
        if(empty($this->cart))
        {
            echo "Carrinho vazio. \n";
            return;
        }

        echo "Itens no carrinho: \n";
        $total = 0;
        foreach ($this->cart as $item)
        {
            echo "- {$item['name']} | {$item['quantity']} unidades | Subtotal: R$ {$item['subtotal']}\n";
            $total += $item['subtotal'];

        }

        echo "TOTAL: R$ {$total}\n\n";

    }
    
}

$p = new ShoppingCart();
$p->showProducts();      
$p->add(1, 2);        
$p->add(3, 3);        
$p->showCart();      
$p->removeProduct(1);
$p->showCart();
$p->showProducts();