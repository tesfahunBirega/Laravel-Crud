<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(string $id): view
    {
        $users = DB::table('products')->select('id','name','qty')->get();

        return view('some-view')->with('products', $products);
    }
}
