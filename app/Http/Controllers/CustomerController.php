<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function getAllCustomers(){
        $customers = DB::table('customers')->get();

        return view('Customers.customerlist', ['customers' => $customers]);
    }

    public function delete($id){
        DB::table('customers')->where('id', $id)->delete();
        return redirect('/customer-list');
    }
}
