<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class BuildingUnitSetup extends BaseModel
{

    protected $fillable = ['title', 'building_id', 'amount'];
    public $migrationDependancy = ['realestate_building'];
    protected $table = "realestate_building_unit_setup";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('title');
        $table->double('amount', 8, 2)->nullable();
        $table->foreignId('building_id')->nullable();
    }


    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_building', 'building_id');
    }
}
