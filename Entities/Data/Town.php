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
        $region_id = DB::table('realestate_region')->where('slug', 'nairobi')->value('id');
        $datasetter->add_data('realestate', 'town', 'slug', [
            "name" => "Nairbi",
            "slug" => "nairobi",
            "region_id" => $region_id,
            "description" => "Nairobi",
        ]);

        $region_id = DB::table('realestate_region')->where('slug', 'mombasa')->value('id');
        $datasetter->add_data('realestate', 'town', 'slug', [
            "name" => "Mombasa",
            "slug" => "mombasa",
            "region_id" => $region_id,
            "description" => "Mombasa",
        ]);

        $region_id = DB::table('realestate_region')->where('slug', 'kisumu')->value('id');
        $datasetter->add_data('realestate', 'town', 'slug', [
            "name" => "Kisumu",
            "slug" => "kisumu",
            "region_id" => $region_id,
            "description" => "Kisumu",
        ]);

        $region_id = DB::table('realestate_region')->where('slug', 'nakuru')->value('id');
        $datasetter->add_data('realestate', 'town', 'slug', [
            "name" => "Nakuru",
            "slug" => "nakuru",
            "region_id" => $region_id,
            "description" => "Nakuru",
        ]);
        $datasetter->add_data('realestate', 'town', 'slug', [
            "name" => "Naivasha",
            "slug" => "naivasha",
            "region_id" => $region_id,
            "description" => "Naivasha",
        ]);

        $region_id = DB::table('realestate_region')->where('slug', 'eldoret')->value('id');
        $datasetter->add_data('realestate', 'town', 'slug', [
            "name" => "Eldoret",
            "slug" => "eldoret",
            "region_id" => $region_id,
            "description" => "Eldoret",
        ]);

    }
}
