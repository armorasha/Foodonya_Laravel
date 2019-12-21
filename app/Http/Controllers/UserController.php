<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUser()
    {
        //works for all products in an array queried
        // $cat_query_result = Category::orderBy('category_id', 'asc')->distinct()->get();
        // $item_query_result1 = Product::orderBy('categories_category_id', 'asc')->get();

        // $item_query_result = Product::join('sizes', 'products.item_id', '=', 'sizes.products_item_id')
        //     ->where('sizes.default_size', '=', '1')
        //     ->where('products.archived', '=', 'false')
        //     ->orderBy('categories_category_id', 'asc')
        //     ->distinct()
        //     ->get();

        //pulling data from Product model
        //dd($query_result->toArray());

        //sends the query result as all products and categories to the menu view
        // return view('menu', [
        //     'all_categories' => $cat_query_result, 'all_products' => $item_query_result,
        // ]);

        return view('/terms');

    }
   
    protected function update2(array $data)
    {
        return User::update([
            'name' => $data['name'],
            'email' => $data['email'],
            //'password' => Hash::make($data['password']),
            'password' => 'password',
            //input password gets hashed here

            'street_address' => $data['street_address'],
            'suburb' => $data['suburb'],
            'state' => $data['state'],
            'postcode' => $data['postcode'],
            'phone' => $data['phone'],

            //These can be null, no need to enter by user
            //'email_verified_at' and 'remember_token'

        ]);
    }


    public function update1(Request $request) //for updating quantity using drop down menu in cart page 
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);
        if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
        }
        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

}
