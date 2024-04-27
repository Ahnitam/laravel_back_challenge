<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class CardController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index($customer_id)
    {
        try {
            return Customer::findOrFail($customer_id)->cards()->when(request('q'), function ($query, $q) {
                return $query->where('name', 'like', "%$q%");
            })->paginate(10);
        } catch (\Throwable $th) {
            return $this->error("Customer not found", 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($customer_id, Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'number' => 'regex:/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/|required|unique:cards,number',
            'expiration_date' => 'required|date_format:m/y',
            'cvv' => 'regex:/^\d{3}$/|required',
        ]);
        return Customer::findOrFail($customer_id)->cards()->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($customer_id, Card $card)
    {
        if ($card->customer_id != $customer_id) {
            return $this->error("Card not found", 404);
        }
        return $card;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($customer_id, Request $request, Card $card)
    {
        if ($card->customer_id != $customer_id) {
            return $this->error("Card not found", 404);
        }

        return $card->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customer_id, Card $card)
    {
        if ($card->customer_id != $customer_id) {
            return $this->error("Card not found", 404);
        }
        $card->delete();
        return $this->response("Success", 200);
    }
}
