<?php

namespace App\Services;
use App\Models\Option;

/**
 * Class OptionService.
 */
class OptionService
{
    public function all(){
        $options = Option::get()->toArray();

        return $options;
    }

    public function destroy($id)
    {
        Option::where('id', $id)->delete();
    }
}
