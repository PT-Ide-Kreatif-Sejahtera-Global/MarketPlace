<?php
// app/Services/ShopeeService.php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ShopeeService 
{
    protected $client;
    protected $partnerId;
    protected $partnerKey;
    protected $shopId;
    protected $accessToken;
    
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.shopee.api_url', 'https://partner.shopeemobile.com'),
            'timeout'  => 30,
        ]);
        
        $this->partnerId = config('services.shopee.partner_id');
        $this->partnerKey = config('services.shopee.partner_key');
        $this->shopId = config('services.shopee.shop_id');
        $this->accessToken = config('services.shopee.access_token');
    }
    
    protected function generateSign($path, $timestamp)
    {
        $baseString = "{$this->partnerId}{$path}{$timestamp}{$this->accessToken}{$this->shopId}";
        return hash_hmac('sha256', $baseString, $this->partnerKey);
    }
    
    public function getProducts($offset = 0, $limit = 100)
    {
        try {
            $timestamp = time();
            $path = '/api/v2/product/get_item_list';
            $sign = $this->generateSign($path, $timestamp);
            
            $queryParams = http_build_query([
                'partner_id' => $this->partnerId,
                'timestamp' => $timestamp,
                'sign' => $sign,
                'shop_id' => $this->shopId,
                'access_token' => $this->accessToken
            ]);
            
            $response = $this->client->post($path . '?' . $queryParams, [
                'json' => [
                    'offset' => $offset,
                    'page_size' => $limit,
                    'item_status' => 'NORMAL'
                ]
            ]);
            
            $result = json_decode($response->getBody(), true);
            
            if (isset($result['error']) && $result['error'] !== '') {
                throw new \Exception("Shopee API Error: {$result['message']}");
            }
            
            return $result['response'];
            
        } catch (GuzzleException $e) {
            throw new \Exception("HTTP Request Failed: " . $e->getMessage());
        }
    }
}