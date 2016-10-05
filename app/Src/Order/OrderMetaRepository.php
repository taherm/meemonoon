<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/16/16
 * Time: 8:31 AM
 */

namespace App\Src\Order;

use App\Core\PrimaryRepository;

class OrderMetaRepository extends PrimaryRepository
{
    public function __construct(OrderMeta $orderMeta)
    {
        $this->model = $orderMeta;
    }

}