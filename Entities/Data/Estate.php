<?php

namespace Modules\Realestate\Models\Data;

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
        $town_id = DB::table('realestate_town')->where('slug', 'nairobi')->value('id');
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Karen",
            "slug" => "karen",
            "description" => "Karen",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Runda",
            "slug" => "runda",
            "description" => "Runda",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Lavington",
            "slug" => "lavington",
            "description" => "Lavington",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Westlands",
            "slug" => "westlands",
            "description" => "Westlands",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kileleshwa",
            "slug" => "kileleshwa",
            "description" => "Kileleshwa",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Parklands",
            "slug" => "parklands",
            "description" => "Parklands",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Buru Buru",
            "slug" => "buru-buru",
            "description" => "Buru Buru",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Umoja",
            "slug" => "umoja",
            "description" => "Umoja",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Donholm",
            "slug" => "donholm",
            "description" => "Donholm",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kayole",
            "slug" => "kayole",
            "description" => "Kayole",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Eastlands",
            "slug" => "eastlands",
            "description" => "Eastlands",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Eastleigh",
            "slug" => "eastleigh",
            "description" => "Eastleigh",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Langata",
            "slug" => "langata",
            "description" => "Langata",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "South B",
            "slug" => "south-b",
            "description" => "South B",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "South C",
            "slug" => "south-c",
            "description" => "South C",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kilimani",
            "slug" => "kilimani",
            "description" => "Kilimani",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Ngong Road",
            "slug" => "ngong-road",
            "description" => "Ngong Road",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kasarani",
            "slug" => "kasarani",
            "description" => "Kasarani",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Roysambu",
            "slug" => "roysambu",
            "description" => "Roysambu",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Githurai",
            "slug" => "githurai",
            "description" => "Githurai",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Muthaiga",
            "slug" => "muthaiga",
            "description" => "Muthaiga",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Gigiri",
            "slug" => "gigiri",
            "description" => "Gigiri",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Ruaka",
            "slug" => "ruaka",
            "description" => "Ruaka",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kikuyu",
            "slug" => "kikuyu",
            "description" => "Kikuyu",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Thome",
            "slug" => "thome",
            "description" => "Thome",
            "town_id" => $town_id,
        ]);

        $town_id = DB::table('realestate_town')->where('slug', 'mombasa')->value('id');
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Nyali",
            "slug" => "nyali",
            "description" => "Nyali",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Bamburi",
            "slug" => "bamburi",
            "description" => "Bamburi",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kizingo",
            "slug" => "kizingo",
            "description" => "Kizingo",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Mtwapa",
            "slug" => "mtwapa",
            "description" => "Mtwapa",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Shanzu",
            "slug" => "shanzu",
            "description" => "Shanzu",
            "town_id" => $town_id,
        ]);

        $town_id = DB::table('realestate_town')->where('slug', 'nakuru')->value('id');
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Milimani",
            "slug" => "milimani",
            "description" => "Milimani",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kaptembwa",
            "slug" => "kaptembwa",
            "description" => "Kaptembwa",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Rhonda",
            "slug" => "rhonda",
            "description" => "Rhonda",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "London",
            "slug" => "london",
            "description" => "London",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Shabaab",
            "slug" => "shabaab",
            "description" => "Shabaab",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Barnabas",
            "slug" => "barnabas",
            "description" => "Barnabas",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Menengai",
            "slug" => "menengai",
            "description" => "Menengai",
            "town_id" => $town_id,
        ]);

        $town_id = DB::table('realestate_town')->where('slug', 'naivasha')->value('id');
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kihoto",
            "slug" => "kihoto",
            "description" => "Kihoto",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Oserian",
            "slug" => "oserian",
            "description" => "Oserian",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Lake View",
            "slug" => "lake-view",
            "description" => "Lake View",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Karagita",
            "slug" => "karagita",
            "description" => "Karagita",
            "town_id" => $town_id,
        ]);

        $town_id = DB::table('realestate_town')->where('slug', 'eldoret')->value('id');
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kapsoya",
            "slug" => "kapsoya",
            "description" => "Kapsoya",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kimumu",
            "slug" => "kimumu",
            "description" => "Kimumu",
            "town_id" => $town_id,
        ]);

        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Langas",
            "slug" => "langas",
            "description" => "Langas",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Elgon View",
            "slug" => "elgon-view",
            "description" => "Elgon View",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "West Indies",
            "slug" => "west-indies",
            "description" => "West Indies",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Annex",
            "slug" => "annex",
            "description" => "Annex",
            "town_id" => $town_id,
        ]);

        $town_id = DB::table('realestate_town')->where('slug', 'kisumu')->value('id');
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Milimani",
            "slug" => "milimani",
            "description" => "Milimani",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kondele",
            "slug" => "kondele",
            "description" => "Kondele",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Manyatta",
            "slug" => "manyatta",
            "description" => "Manyatta",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Nyalenda",
            "slug" => "nyalenda",
            "description" => "Nyalenda",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Lolwe",
            "slug" => "lolwe",
            "description" => "Lolwe",
            "town_id" => $town_id,
        ]);
        $datasetter->add_data('realestate', 'estate', 'slug', [
            "name" => "Kanyakwar",
            "slug" => "kanyakwar",
            "description" => "Kanyakwar",
            "town_id" => $town_id,
        ]);

    }
}
