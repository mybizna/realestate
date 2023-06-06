<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class Region extends BaseModel
{

    protected $fillable = ['name', 'description', 'country_id', 'state_id'];
    public $migrationDependancy = ['core_country', 'core_state'];
    protected $table = "realestate_region";

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
        $table->foreignId('country_id')->nullable();
        $table->foreignId('state_id')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'core_country', 'country_id');
        Migration::addForeign($table, 'core_state', 'state_id');
    }
}
