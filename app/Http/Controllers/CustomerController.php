<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return customrs with filter if exists with pagination
        return Customer::when(request('q'), function ($query, $q) {
            return $query->where('name', 'like', "%$q%");
        })->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'regex:/^\(\d{2}\)\s\d\s\d{4}-\d{4}$/|required',
            'birthday' => 'required|date_format:Y-m-d',
            'cep' => 'regex:/^\d{5}-\d{3}$/|required|string',
            'street' => 'required|min:3',
            'number' => 'required',
            'district' => 'required|min:3',
            'city' => 'required|min:3',
            'state' => 'required|min:2|max:2',
        ]);
        $customer = Customer::create($request->only([
            'name',
            'last_name',
            'email',
            'phone',
            'birthday',
        ]));
        $customer->address()->create($request->only([
            'cep',
            'street',
            'number',
            'district',
            'city',
            'state',
        ]));
        return $customer->load('address');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return $customer->load('address');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'min:3',
            'last_name' => 'min:3',
            'email' => 'email',
            'phone' => 'regex:/^\(\d{2}\)\s\d\s\d{4}-\d{4}$/',
            'birthday' => 'date_format:Y-m-d',
            'cep' => 'regex:/^\d{5}-\d{3}$/|string',
            'street' => 'min:3',
            'district' => 'min:3',
            'city' => 'min:3',
            'state' => 'min:2|max:2',
        ]);

        $customer->update($request->only([
            'name',
            'last_name',
            'email',
            'phone',
            'birthday',
        ]));
        $customer->address()->updateOrCreate($request->only([
            'cep',
            'street',
            'number',
            'district',
            'city',
            'state',
        ]));

        return $this->response("Customer updated successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        return $customer->delete();
    }
}
