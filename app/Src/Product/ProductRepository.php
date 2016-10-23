<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 4/26/16
 * Time: 6:02 PM
 */

namespace App\Src\Product;

use App\Core\PrimaryRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class ProductRepository extends PrimaryRepository
{

    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }


    /**
     * Description : will fetch all products of the current company (and branch) that are bestSales
     * according to the orders that are completed
     * @param $companyId
     * @return mixed
     */
    public function bestSalesProductsIds()
    {
        return DB::table('products')
            ->where('products.active', '=', 1)
            ->join('product_metas', function ($j) {
                $j->on('products.id', '=', 'product_metas.product_id');
            })
            ->join('orders', function ($j) {
                $j->where('orders.status', '=', 'completed');
            })
            ->join('order_metas', function ($j) {
                $j->on('orders.id', '=', 'order_metas.order_id')->on('products.id', '=', 'order_metas.product_id');
            })
            ->select('products.id', DB::raw('count(*) as count'))
            ->groupBy('products.id')// responsible to get the sum of products returned
            ->orderBy('count', 'DESC')// DESC
            ->pluck('id');
    }

    public function bestSalesProducts()
    {
        return $this->model->whereIn('id', $this->bestSalesProductsIds())->take(12)->get();

    }

    public function getRelatedProducts($productId)
    {
        return $this->model->whereId($productId)->first()->parent()->first()->products()->where('id', '!=', $productId)->take(5)->get();
    }


}