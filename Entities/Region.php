<?php

namespace Modules\Realestate\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Region extends BaseModel
{

    protected $fillable = ['name', 'description', 'country_id', 'state_id'];
    public $migrationDependancy = ['core_country', 'core_state'];
    protected $table = "realestate_region";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->type('text')->ordering(true);
        $fields->name('country_id')->type('recordpicker')->table('core_country')->ordering(true);
        $fields->name('state_id')->type('recordpicker')->table('core_state')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('country_id')->type('recordpicker')->table('core_country')->group('w-1/2');
        $fields->name('state_id')->type('recordpicker')->table('core_state')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('country_id')->type('recordpicker')->table('core_country')->group('w-1/6');
        $fields->name('state_id')->type('recordpicker')->table('core_state')->group('w-1/6');
        

        return $fields;

    }
    
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
