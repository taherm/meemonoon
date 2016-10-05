<?php

namespace App\Src\Cart;

use App\Src\Product\Product;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class Cart {
    /**
     * @var CartInterface
     */
    private $cart;

    public $subTotal; // before calculating sale price
    public $grandTotal; // after calculating sale price 
    public $netWeight; // after calculating sale price 
    public $items = []; // Item Collection

    /**
     * Cart constructor.
     * @param CartInterface $cart
     */
    public function __construct(CartInterface $cart)
    {
        $this->cart = $cart;
    }

    public function addItem(array $item ) {
        $this->validateItem($item);
        return $this->cart->addItem($item);
    }

    public function removeItem($key) {
        return $this->cart->removeItem($key);
    }

    public function updateItem(array $item)
    {
        $this->validateItem($item);
        return $this->cart->updateItem($item);
    }

    public function getItems()
    {
        return collect($this->cart->getItems());
    }

    public function getItemsCount()
    {
        return collect($this->cart->getItems())->count();
    }
    
    public function getItemByKey($key)
    {
        return $this->cart->getItemByKey($key);
    }

    public function flushCart()
    {
        return $this->cart->flushCart();
    }

    private function validateItem($item)
    {
        if(!is_array($item) || !count($item === 1)) {
            throw new Exception('Item can only contain one array');
        }

        if(!array_key_exists('quantity',$item) || !is_int($item['quantity']) || $item['quantity'] <= 0 ) {
            throw new Exception('Invalid Quantity');
        }

//        if(!array_key_exists('product_attribute_id',$item) || !is_int($item['product_attribute_id']) || $item['product_attribute_id'] <= 0 ) {
//            throw new Exception('Invalid Product Attribute');
//        }
    }

    public function make(Collection $products)
    {
        // prepare the cart items (calculate net weight,net price (sale,actual)
        $this->items = collect([]);
        $cartItems = $this->getItems();
        $products->map(function($product) use ($cartItems) {
            $cartItem = $cartItems[$product->id];
            $productQuantity = $cartItem['quantity'];
            // cast the array to object
            $item = (object) array_merge([
                'name' => $product->name,
                'image'=>$product->product_meta->image,
                'sale_price' => $product->product_meta->final_price, // final price ... includes discount
                'price' => $product->product_meta->price,
                'sub_total'=> $product->product_meta->price * $productQuantity,
                'grand_total'=> $product->product_meta->final_price * $productQuantity,
                'total_weight'=> $product->product_meta->weight * $productQuantity,
            ],
                $this->getItemByKey($product->id)
            );
            $this->items->push($item);
        });

        $this->subTotal = $this->items->sum('sub_total');
        $this->grandTotal = $this->items->sum('grand_total');
        $this->netWeight = $this->items->sum('total_weight');

        return $this;
    }
}