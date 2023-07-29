<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;

class BuildingUnitSetup extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['title', 'building_id', 'amount'];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = ['realestate_building'];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "realestate_building_unit_setup";

    public function  listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('building_id')->type('recordpicker')->table('realestate_building')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('building_id')->type('recordpicker')->table('realestate_building')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('building_id')->type('recordpicker')->table('realestate_building')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
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
