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

        $estate_id = DB::table('realestate_estate')->where('slug', 'karen')->value('id');
        $datasetter->add_data('realestate', 'building', 'slug', [
            "name" => "Acacia Court Apartments",
            "slug" => "acacia_court_apartments",
            "estate_id" => $estate_id,
            "type" => "apartment",
            "description" => "Acacia Court Apartments",
            "units" => 10,
            "default_deposit" => 1000,
            "default_goodwill" => 1000,
            "default_amount" => 1000,
            "is_full" => false,
        ]);

        $estate_id = DB::table('realestate_estate')->where('slug', 'kondele')->value('id');
        $datasetter->add_data('realestate', 'building', 'slug', [
            "name" => "Lakeview Heights",
            "slug" => "lakeview_heights",
            "estate_id" => $estate_id,
            "type" => "apartment",
            "description" => "Lakeview Heights",
            "units" => 10,
            "default_deposit" => 1000,
            "default_goodwill" => 1000,
            "default_amount" => 1000,
            "is_full" => false,
        ]);

        $estate_id = DB::table('realestate_estate')->where('slug', 'nyali')->value('id');
        $datasetter->add_data('realestate', 'building', 'slug', [
            "name" => "Savannah Gardens",
            "slug" => "savannah_gardens",
            "estate_id" => $estate_id,
            "type" => "apartment",
            "description" => "Savannah Gardens",
            "units" => 10,
            "default_deposit" => 1000,
            "default_goodwill" => 1000,
            "default_amount" => 1000,
            "is_full" => false,
        ]);

        $estate_id = DB::table('realestate_estate')->where('slug', 'kapsoya')->value('id');
        $datasetter->add_data('realestate', 'building', 'slug', [
            "name" => "Rift Valley Residences",
            "slug" => "rift_valley_residences",
            "estate_id" => $estate_id,
            "type" => "apartment",
            "description" => "Rift Valley Residences",
            "units" => 10,
            "default_deposit" => 1000,
            "default_goodwill" => 1000,
            "default_amount" => 1000,
            "is_full" => false,
        ]);

        $estate_id = DB::table('realestate_estate')->where('slug', 'oserian')->value('id');
        $datasetter->add_data('realestate', 'building', 'slug', [
            "name" => "Simba Heights Apartments",
            "slug" => "simba_heights_apartments",
            "estate_id" => $estate_id,
            "type" => "apartment",
            "description" => "Simba Heights Apartments",
            "units" => 10,
            "default_deposit" => 1000,
            "default_goodwill" => 1000,
            "default_amount" => 1000,
            "is_full" => false,
        ]);

    }
}
