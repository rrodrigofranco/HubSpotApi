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
        $orderform  = Vtex::getOrderFormConfiguration();
        dd($orderform);
        $orderform['recaptchaKeys'] = [
                "clientId" => "32535405986-g4vum54tekqd5t1b6c70uls8lorenqh2.apps.googleusercontent.com",
                "clientSecret" => "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",
                "projectId" => "grupocentral",
                "label" => "vtexappkey-centralfarma-BYFGWD",
                "score" => null
        ];
        //https://console.cloud.google.com/security/recaptcha/6Ldk31wqAAAAAOjGYfYTSsMkD_nD9denNMQtwlzc/details?project=grupocentral&authuser=0
        $updateForm = Vtex::UpdateOrderFormConfiguration($orderform);
        dd($updateForm);
        $orders     = Vtex::getOrders($params);
        $orderId    = $orders["list"][0]["orderId"];
        $order      = Vtex::getOrder( $orderId);
        $products   = Vtex::getProductAndSkuIds();
        $skuId      = $products["data"][1][0];
        $inventory  = Vtex::getInventory($skuId);
        $price      = Vtex::getSkuPrice($skuId);
        dd($order);
        return view('welcome', $orders);
    }
}
