<?php

namespace App\Services;
use App\Models\Product;

/**
 * Class ProductService.
 */
class ProductService
{
    public function all(){
        $products = Product::with('section')->with('category')->get();

        return $products;
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
    }

    public function addEdit($id){
        $product = Product::select('id', 'product_name', 'product_price', 'product_image')->with('attributes')->find($id);

        return $product;
    }
}
