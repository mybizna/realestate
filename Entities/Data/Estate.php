<?php

namespace Modules\Realestate\Entities\Data;
use Illuminate\Support\Facades\DB;
use Modules\Base\Classes\Datasetter;

class Estate
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
        $town_1 = DB::table('realestate_town')->where('slug', 'town_1')->value('id');

        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Estate 1",
            "slug" => "estate_1",
            "description" => "Estate 1",
            "town_id" => $town_1,
        ]);
    }
}
