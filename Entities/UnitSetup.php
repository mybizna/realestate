<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

class UnitSetup extends BaseModel
{

    protected $fillable = ['title', 'unit_id', 'amount'];
    public $migrationDependancy = ['realestate_unit'];
    protected $table = "realestate_unit_setup";

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
        $table->foreignId('unit_id')->nullable();
        $table->double('amount', 8, 2)->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_unit', 'unit_id');
    }
}
