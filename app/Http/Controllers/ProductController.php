<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function foodBeverage()
    {
        return view('products.food');
    }

    public function beautyHealth()
    {
        return view('products.beauty');
    }

    public function homeCare()
    {
        return view('products.homecare');
    }

    public function babyKid()
    {
        return view('products.babykid');
    }
}