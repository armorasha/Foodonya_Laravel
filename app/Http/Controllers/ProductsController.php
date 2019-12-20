<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; //for mysql db from .env file
use App\Product; //for using Product.php eloquent model in this controller
use App\Category;
use App\Size;

class ProductsController extends Controller
{
    public function show($product_id)
    {
        //return 'hi';

        /*      $products = [
         'Pizza1' => 'Supreme',
         'Pizza2' => 'Hawaiian'

     ]; */

        //works for one product object queried direct from DB
        //sql query builder
        //$query_result = DB::table('products') -> where('item_name', $product_name)->first();
        //$query_result = DB::table('products')->where('item_id', $product_id)->first();
        //dd($query_result);


        //worked before but not now
        //$query_result = Product::where('item_id', $product_id)->firstOrFail();


        //works for all products in an array queried
        $query_result = Product::all();
        //pulling data from Product model
        //dd($query_result->toArray());


    //sends the query result as selected product to the product view
     return view('product', [
         'selected_product' => $query_result
     ]);
 
    }


/*     public function getall()
    {      
        //works for all products in an array queried
        $query_result = Product::all();
        //pulling data from Product model
        //dd($query_result->toArray());

        //sends the query result as selected product to the product view
        return view('menu', [
            'all_products' => $query_result
        ]);
    } */

/*     public function getProduct($product_id)
    {
        //works for one product object queried direct from DB
        //sql query builder
        //$query_result = DB::table('products') -> where('item_name', $product_name)->first();
        //$query_result = DB::table('products')->where('item_id', $product_id)->first();
        //dd($query_result);

        //worked before but not now
        $query_result = Product::where('item_id', $product_id)->firstOrFail();

        //pulling data from Product model
        //dd($query_result->toArray());


        //sends the query result as selected product to the product view
        return view('product', [
            'selected_product' => $query_result
        ]);
    } */

    public function getAllCategoriesAndProducts()
    {        
        //works for all products in an array queried
        $cat_query_result = Category::orderBy('category_id', 'asc')->distinct()->get();
        $item_query_result1 = Product::orderBy('categories_category_id', 'asc')->get();

        $item_query_result = Product::join('sizes', 'products.item_id', '=', 'sizes.products_item_id')
        ->where('sizes.default_size', '=', '1')
        ->where('products.archived','=','false')
        ->orderBy('categories_category_id', 'asc')
        ->distinct()
        ->get();

        //pulling data from Product model
        //dd($query_result->toArray());

        //sends the query result as all products and categories to the menu view
        return view('menu', [
            'all_categories' => $cat_query_result, 'all_products' => $item_query_result,
        ]);
    }

    public function showSelected($received_id)
    {
        //$product = Product::find($received_id);//this will NOT work because 'find' works by searching generic 'id' not customised 'item_id'. 
        //..Use where statement instead of find

        $product = Product::where('item_id', $received_id)->first();
        $product_sizes = Size::where('products_item_id', $received_id)->get();

        //dd($product_sizes);

        //sends the query result as selected product to the product view
        return view('products.select', ['product' => $product, 'product_sizes' => $product_sizes]);
    }

/*     public function getAllSortedByCategory()
    {
        //works for all products in an array queried
        $query_result = Product::orderBy('categories_category_id', 'asc')->get();
        //pulling data from Product model
        //dd($query_result->toArray());

        //sends the query result as selected product to the product view
        return view('menu', [
            'allProductsSortedByCategory' => $query_result
        ]);
    } */
}
