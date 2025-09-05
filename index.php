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
        echo "<h3>Produtos disponíveis:</h3>";
        foreach ($this->products as $product) {
            echo "- ID {$product['id']} | {$product['name']} | R$ {$product['price']} | stock: {$product['stock']}<br>";
        }
        echo '<br>';
    }


    public function Add(int $id, int $quantity): void
    {
        foreach ($this->products as &$product) {
            if ($product['id'] === $id) {
                if ($product['stock'] < $quantity && $product['stock'] >= 1) {
                    echo "Não foi possivel adicionar ao carrinho. O {$product['name']} tem apenas {$product['stock']} unidades.<br>";
                    return;
                }


                if ($product['stock'] == 0) {
                    echo "Produto esgotado!<br>";
                    return;
                }


                $this->cart[] = [
                    'product_id' => $id,
                    'name' => $product['name'],
                    'quantity' => $quantity,
                    'subtotal' => $product['price'] * $quantity
                ];


                $product['stock'] -= $quantity;
                echo "{$product['name']} adicionado ao carrinho ({$quantity} un).<br>";
                return;
            }
        }


        echo " Produto não encontrado.<br>";
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
            echo "Produto não encontrado no carrinho. <br>";
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
                echo "Produto {$product['name']} (ID {$id}), foi removido do carrinho e o estoque atualizado.<br>";
                return;

            }
        }      

    }

    public function showCart(): void 
    {
        if(empty($this->cart))
        {
            echo "Carrinho vazio. <br>";
            return;
        }

        echo "<h3>Itens no carrinho: </h3>";
        $total = 0;

        foreach ($this->cart as $item)
        {
            echo "- {$item['name']} | {$item['quantity']} unidades | Subtotal: R$ {$item['subtotal']}<br>";
            $total += $item['subtotal'];

        }

        echo "<strong>Total do carrinho: R$ {$total}</strong><br>";
        echo "<br>";

    }

    public function applyDiscount(string $coupon): void{
        if (empty($this->cart)) {
            echo "Carrinho vazio, não é possível aplicar desconto.<br>";
            return;
        }

        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['subtotal'];
        }

        if ($coupon === "DESCONTO10") {
            $discount = $total * 0.10;
            $finalTotal = $total - $discount;
            echo"cupom aplicado: DESCONTO10 (-10%)<br>";
            echo "<strong>Total com desconto aplicado: R$ {$finalTotal}</strong><br>";
        } else {
            echo "Cupom inválido.<br>";
        }
    }
    
}


echo "<h1>Bem-vindo ao aplicativo de compras!</h1>";
$p = new ShoppingCart();
$p->showProducts();      
$p->add(1, 2);  
$p->add(3, 10);        
$p->add(3, 3);        
$p->showCart();      
$p->removeProduct(1);
$p->showCart();
$p->showProducts();
$p->add(3, 1);    
$p->applyDiscount("DESCONTO10");