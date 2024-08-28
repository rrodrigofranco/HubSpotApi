<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class HubSpot
{
    // Tickets
    public static function getTickets()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->get('https://api.hubapi.com/crm/v3/objects/tickets');

        return $response->json();
    }

    public static function createTicket($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->post('https://api.hubapi.com/crm/v3/objects/tickets', $data);

        return $response->json();
    }

    public static function getTicket($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->get("https://api.hubapi.com/crm/v3/objects/tickets/{$id}");

        return $response->json();
    }

    public static function updateTicket($id, $data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->patch("https://api.hubapi.com/crm/v3/objects/tickets/{$id}", $data);

        return $response->json();
    }

    public static function deleteTicket($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->delete("https://api.hubapi.com/crm/v3/objects/tickets/{$id}");

        return $response->json();
    }

    // Deals
    public static function getDeals()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->get('https://api.hubapi.com/crm/v3/objects/deals');

        return $response->json();
    }

    public static function createDeal($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->post('https://api.hubapi.com/crm/v3/objects/deals', $data);

        return $response->json();
    }

    public static function getDeal($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->get("https://api.hubapi.com/crm/v3/objects/deals/{$id}");

        return $response->json();
    }

    public static function updateDeal($id, $data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->patch("https://api.hubapi.com/crm/v3/objects/deals/{$id}", $data);

        return $response->json();
    }

    public static function deleteDeal($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->delete("https://api.hubapi.com/crm/v3/objects/deals/{$id}");

        return $response->json();
    }

    //Contacts
    public static function getContacts()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->get('https://api.hubapi.com/crm/v3/objects/contacts');

        return $response->json();
    }

    public static function createContact($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->post('https://api.hubapi.com/crm/v3/objects/contacts', $data);

        return $response->json();
    }

    public static function getContact($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->get("https://api.hubapi.com/crm/v3/objects/contacts/{$id}");

        return $response->json();
    }

    public static function updateContact($id, $data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->patch("https://api.hubapi.com/crm/v3/objects/contacts/{$id}", $data);

        return $response->json();
    }

    public static function deleteContact($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
        ])->delete("https://api.hubapi.com/crm/v3/objects/contacts/{$id}");

        return $response->json();
    }
}
