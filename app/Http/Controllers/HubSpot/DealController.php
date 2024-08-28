<?php

namespace App\Http\Controllers\HubSpot;

use App\Http\Controllers\Controller;
use App\Helpers\HubSpot;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        // Retrieve a list of deals from HubSpot
        $deals = HubSpot::getDeals();
        return response()->json($deals);
    }

    public function store(Request $request)
    {
        // Create a new deal in HubSpot
        $deal = HubSpot::createDeal($request->all());
        return response()->json($deal);
    }

    public function show($id)
    {
        // Retrieve a specific deal from HubSpot
        $deal = HubSpot::getDeal($id);
        return response()->json($deal);
    }

    public function update(Request $request, $id)
    {
        // Update a specific deal in HubSpot
        $updatedDeal = HubSpot::updateDeal($id, $request->all());
        return response()->json($updatedDeal);
    }

    public function destroy($id)
    {
        // Delete a specific deal from HubSpot
        $deletedDeal = HubSpot::deleteDeal($id);
        return response()->json($deletedDeal);
    }
}
