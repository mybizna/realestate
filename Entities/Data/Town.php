<?php

namespace Modules\Realestate\Entities\Data;

use Illuminate\Support\Facades\DB;
use Modules\Base\Classes\Datasetter;

class Town
{
    /**
     * Set ordering of the Class to be migrated.
     * 
     * @var int
     */
    public $ordering = 7;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {
        $region_id = DB::table('realestate_region')->where('slug', 'region_1')->value('id');

        $datasetter->add_data('realestate', 'town', 'slug', [
            "name" => "Town 1",
            "slug" => "town_1",
            "region_id" => $region_id,
            "description" => "Town 1",
        ]);


    }
}
