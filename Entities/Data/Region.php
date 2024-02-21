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
            "name" => "Region 1",
            "slug" => "region_1",
            "description" => "Region 1",
            "country_id" => $country_id,
            "state_id" => $state_id,
        ]);
    }
}
