<?php
require_once __DIR__ . '/src/ShoppingCart.php';

echo "<h1>Bem-vindo ao aplicativo de compras!</h1>";
$user = new ShoppingCart();
$user->showProducts();      
$user->add(1, 2);  
$user->add(3, 10);        
$user->add(3, 3);        
$user->showCart();      
$user->removeProduct(1);
$user->showCart();
$user->showProducts();
$user->add(3, 1);    
$user->applyDiscount("DESCONTO10");