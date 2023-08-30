<?php

namespace App\Services;
use App\Models\Section;

/**
 * Class SectionService.
 */
class SectionService
{

    public function all(){
        $sections = Section::get()->toArray();

        return $sections;
    }

    public function destroy($id)
    {
        Section::where('id', $id)->delete();
    }
}
