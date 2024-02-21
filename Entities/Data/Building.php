<?php

namespace Modules\Realestate\Entities\Data;
use Illuminate\Support\Facades\DB;
use Modules\Base\Classes\Datasetter;

class Building
{
    /**
     * Set ordering of the Class to be migrated.
     * 
     * @var int
     */
    public $ordering = 10;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {

        $estate_id = DB::table('realestate_estate')->where('slug', 'estate_1')->value('id');
       
        $datasetter->add_data('realestate', 'building', 'slug', [
            "name" => "Building 1",
            "slug" => "building_1",
            "estate_id" => $estate_id,
            "type" => "apartment",
            "description" => "Building 1",
            "units" => 10,
            "default_deposit" => 1000,
            "default_goodwill" => 1000,
            "default_amount" => 1000,
            "is_full" => false,
        ]);

        $datasetter->add_data('realestate', 'building', 'slug', [
            "name" => "Building 2",
            "slug" => "building_1",
            "estate_id" => $estate_id,
            "type" => "apartment",
            "description" => "Building 2",
            "units" => 10,
            "default_deposit" => 1000,
            "default_goodwill" => 1000,
            "default_amount" => 1000,
            "is_full" => false,
        ]);

    }
}
