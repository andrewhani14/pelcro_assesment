<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class restApi extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'user_name' => 'required',
            'salary' => 'required',
            'status' => 'required'
        ]);

        $customer = Customer::create($request->all());

        return response()->json($customer, 201);
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, $id)
    {
        $customerId = Customer::find($id);

        if($customerId){
            return response()->json($customerId);
        }
        
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Customer not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer ,$id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'user_name' => 'required',
            'salary' => 'required',
            'status' => 'required'
        ]);
        $customerId = Customer::find($id);

        if($customerId){
            $customerId->update($request->all());
            return response()->json($customerId, 200);
        }
        
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Customer not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, $id)
    {
        $customerId = Customer::find($id);
        if($customerId)
        {
            $customerId->delete();
            return response()->json([
                'status'=>true,
                'message'=>'Customer deleted sucessfully'
            ]);        
        }
        
        else{
            return response()->json([
                'status'=>false,
                'message'=>'Customer not found'
            ]);
        }
    }
}
