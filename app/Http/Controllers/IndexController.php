<?php

namespace App\Http\Controllers;
use App\Helpers\Vtex;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $params = json_encode([
            "f_creationDate" => "creationDate:[2024-01-01T00:00:00Z TO 2024-09-11T23:59:59Z]",
            "status" => "completed"
        ], true);

        $orders     = Vtex::getOrders($params);
        $order      = Vtex::getOrder("1461360613477-01");
        $products   = Vtex::getProductAndSkuIds();
        $skuId      = $products["data"][1][0];
        $inventory  = Vtex::getInventory($skuId);
        $price      = Vtex::getSkuPrice($skuId);
        dd( $price);
        return view('welcome', $orders);
    }
}
