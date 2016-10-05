<?php

namespace App\Src\Cart;

interface CartInterface
{
    public function addItem(array $item);
    public function updateItem(array $item);
    public function removeItem($key);
    public function flushCart();
    public function getItems();
    public function getItemByKey( $key);
}