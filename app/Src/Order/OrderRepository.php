<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/16/16
 * Time: 8:29 AM
 */

namespace App\Src\Order;


use App\Core\PrimaryRepository;

class OrderRepository extends PrimaryRepository
{

    public function __construct(Order $order)
    {
        $this->model = $order;
    }


}