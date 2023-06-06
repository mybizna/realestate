<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class Estate extends BaseModel
{

    protected $fillable = ['name', 'description', 'town_id'];
    public $migrationDependancy = ['realestate_town'];
    protected $table = "realestate_estate";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('name');
        $table->string('description')->nullable();
        $table->foreignId('town_id')->nullable();
    }


    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_town', 'town_id');
    }
}
