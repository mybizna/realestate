<?php

namespace Modules\Realestate\Entities\Data;

use Illuminate\Support\Facades\DB;
use Modules\Base\Classes\Datasetter;

class Region
{
    /**
     * Set ordering of the Class to be migrated.
     * 
     * @var int
     */
    public $ordering = 5;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {
        $country_id = DB::table('core_country')->where('code', 'KE')->value('id');
        $state_id = DB::table('core_state')->where('country_code', 'KE')->value('id');
      

        $datasetter->add_data('realestate', 'region', 'slug', [
            "name" => "Nairobi County",
            "slug" => "nairobi",
            "description" => "Nairobi County",
            "country_id" => $country_id,
            "state_id" => $state_id,
        ]);

        $datasetter->add_data('realestate', 'region', 'slug', [
            "name" => "Mombasa County",
            "slug" => "mombasa",
            "description" => "Mombasa County",
            "country_id" => $country_id,
            "state_id" => $state_id,
        ]);

        $datasetter->add_data('realestate', 'region', 'slug', [
            "name" => "Kisumu County",
            "slug" => "kisumu",
            "description" => "Kisumu County",
            "country_id" => $country_id,
            "state_id" => $state_id,
        ]);

        $datasetter->add_data('realestate', 'region', 'slug', [
            "name" => "Nakuru County",
            "slug" => "nakuru",
            "description" => "Nakuru County",
            "country_id" => $country_id,
            "state_id" => $state_id,
        ]); 

        $datasetter->add_data('realestate', 'region', 'slug', [
            "name" => "Eldoret County",
            "slug" => "eldoret",
            "description" => "Eldoret County",
            "country_id" => $country_id,
            "state_id" => $state_id,
        ]);
    }
}
