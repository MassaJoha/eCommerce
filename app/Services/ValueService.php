<?php

namespace App\Services;
use App\Models\Value;

/**
 * Class ValueService.
 */
class ValueService
{

    public function all(){
        $values = Value::with(['option'])->get();

        return $values;
    }

    public function destroy($id){
        
        value::where('id', $id)->delete();
    }
}
