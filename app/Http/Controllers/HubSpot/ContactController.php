<?php

namespace App\Http\Controllers\HubSpot;

use App\Http\Controllers\Controller;
use App\Helpers\HubSpot;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Retrieve a list of contacts from HubSpot
        $contacts = HubSpot::getContacts();
        return response()->json($contacts);
    }

    public function store(Request $request)
    {
        // Create a new contact in HubSpot
        $contact = HubSpot::createContact($request->all());
        return response()->json($contact);
    }

    public function show($id)
    {
        // Retrieve a specific contact from HubSpot
        $contact = HubSpot::getContact($id);
        return response()->json($contact);
    }

    public function update(Request $request, $id)
    {
        // Update a specific contact in HubSpot
        $updatedContact = HubSpot::updateContact($id, $request->all());
        return response()->json($updatedContact);
    }

    public function destroy($id)
    {
        // Delete a specific contact from HubSpot
        $deletedContact = HubSpot::deleteContact($id);
        return response()->json($deletedContact);
    }
}
