<?php

namespace App\Services;
use App\Models\Brand;

/**
 * Class BrandService.
 */
class BrandService
{
    public function all(){
        $brands = Brand::get()->toArray();

        return $brands;
    }

    public function destroy($id)
    {
        Brand::where('id', $id)->delete();
    }
}
