<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class Town extends BaseModel
{

    protected $fillable = ['name', 'region_id', 'description'];
    public $migrationDependancy = ['realestate_region'];
    protected $table = "realestate_town";

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
        $table->foreignId('region_id')->nullable();
        $table->string('description')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_region', 'region_id');
    }
}
