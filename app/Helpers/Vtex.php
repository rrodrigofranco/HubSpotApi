<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Vtex
{
    // Orders
    public static function getOrders($params = [])
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey'   => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get('https://' . env('VTEX_STORE') . '.vtexcommercestable.com.br/api/oms/pvt/orders', $params);

        return $response->json();
    }

    public static function getOrder($orderId)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey'   => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/oms/pvt/orders/{$orderId}");

        return $response->json();
    }

    // Invoices
    public static function getInvoices($orderId)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey'   => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/oms/pvt/orders/{$orderId}/invoice");

        return $response->json();
    }

    public static function createInvoice($orderId, $data)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey'   => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->post("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/oms/pvt/orders/{$orderId}/invoice", $data);

        return $response->json();
    }

    // Payments
    public static function getPayments($orderId)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey'   => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/payments/pvt/orders/{$orderId}/payments");

        return $response->json();
    }

    public static function refundPayment($paymentId, $data)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey'   => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->post("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/payments/pvt/payments/{$paymentId}/refund", $data);

        return $response->json();
    }

    public static function cancelPayment($paymentId)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->post("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/payments/pvt/payments/{$paymentId}/cancellation");

        return $response->json();
    }

    // Product Catalog
    public static function getProducts($params = [])
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get('https://' . env('VTEX_STORE') . '.vtexcommercestable.com.br/api/catalog_system/pvt/products', $params);

        return $response->json();
    }

     // Product Catalog
     public static function getProductAndSkuIds($params = [])
     {
         $response = Http::withHeaders([
             'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
             'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
         ])->get('https://' . env('VTEX_STORE') . '.vtexcommercestable.com.br/api/catalog_system/pvt/products/GetProductAndSkuIds', $params);

         return $response->json();
     }

    public static function getProduct($productId)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get('https://' . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/catalog_system/pvt/products/ProductGet/{$productId}");

        return $response->json();
    }

    // SKU Management
    public static function getSku($skuId)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/catalog_system/pvt/sku/stockkeepingunitbyid/{$skuId}");

        return $response->json();
    }

    public static function updateSku($skuId, $data)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->post("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/catalog/pvt/stockkeepingunit/{$skuId}", $data);

        return $response->json();
    }

    // Inventory
    public static function getInventory($skuId)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/logistics/pvt/inventory/skus/{$skuId}");

        return $response->json();
    }

    public static function updateInventory($skuId, $warehouseId, $data)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->post("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/logistics/pvt/inventory/skus/{$skuId}/warehouse/{$warehouseId}", $data);

        return $response->json();
    }

    // Pricing
    public static function getSkuPrice($skuId)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/pricing/prices/{$skuId}");

        return $response->json();
    }

    public static function updateSkuPrice($skuId, $data)
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->put("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/pricing/prices/{$skuId}", $data);

        return $response->json();
    }

    public static function getOrderFormConfiguration()
    {
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->get("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/checkout/pvt/configuration/orderForm");

        return $response->json();
    }

    public static function UpdateOrderFormConfiguration($data = [])
    {

        // Make the POST request to the VTEX API with headers and data
        $response = Http::withHeaders([
            'X-VTEX-API-AppKey' => env('VTEX_APP_KEY'),
            'X-VTEX-API-AppToken' => env('VTEX_APP_TOKEN'),
        ])->post("https://" . env('VTEX_STORE') . ".vtexcommercestable.com.br/api/checkout/pvt/configuration/orderForm", $data);

        return [
            'status' =>$response->status(),
            'data' => $response->json(),
        ];
    }

}
