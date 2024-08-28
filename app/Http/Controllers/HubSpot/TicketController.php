<?php

namespace App\Http\Controllers\HubSpot;

use App\Http\Controllers\Controller;
use App\Helpers\HubSpot;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        // Retrieve a list of tickets from HubSpot
        $tickets = HubSpot::getTickets();
        return response()->json($tickets);
    }

    public function store(Request $request)
    {
        // Create a new ticket in HubSpot
        $ticket = HubSpot::createTicket($request->all());
        return response()->json($ticket);
    }

    public function show($id)
    {
        // Retrieve a specific ticket from HubSpot
        $ticket = HubSpot::getTicket($id);
        return response()->json($ticket);
    }

    public function update(Request $request, $id)
    {
        // Update a specific ticket in HubSpot
        $updatedTicket = HubSpot::updateTicket($id, $request->all());
        return response()->json($updatedTicket);
    }

    public function destroy($id)
    {
        // Delete a specific ticket from HubSpot
        $deletedTicket = HubSpot::deleteTicket($id);
        return response()->json($deletedTicket);
    }
}
