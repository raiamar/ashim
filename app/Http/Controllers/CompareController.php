<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function compare(Request $request) {
        $products = Product::all();
        if($request->first_product){
            $first_product = Product::where('id', $request->first_product)->first();
        }
        if($request->second_product){
            $second_product = Product::where('id', $request->second_product)->first();
        }
        if($request->third_product){
            $third_product = Product::where('id', $request->third_product)->first();
        }
        $data = [
            'Image' => [
                'first' => $first_product->image ?? '',
                'second' => $second_product->image ?? '',
                'third' => $third_product->image ?? '',
            ],
            'Name' => [
                'first' => $first_product->menu_name ?? '',
                'second' => $second_product->menu_name ?? '',
                'third' => $third_product->menu_name ?? '',
            ],
            'Category' => [
                'first' => $first_product->category ?? '',
                'second' => $second_product->category ?? '',
                'third' => $third_product->category ?? '',
            ],
            'Description' => [
                'first' => $first_product->description ?? '',
                'second' => $second_product->description ?? '',
                'third' => $third_product->description ?? '',
            ],
            'Price' => [
                'first' => $first_product->price ?? '',
                'second' => $second_product->price ?? '',
                'third' => $third_product->price ?? '',
            ],
        ];
        $ids = [
            'first' => $first_product->id ?? '',
            'second' => $second_product->id ?? '',
            'third' => $third_product->id ?? '',
        ];
        return view('frontend.pages.compare', compact('data', 'products', 'ids'));
    }
}
