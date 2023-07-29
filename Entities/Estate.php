<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Estate extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['name', 'description', 'town_id'];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = ['realestate_town'];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "realestate_estate";

    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->type('text')->ordering(true);
        $fields->name('town_id')->type('recordpicker')->table('realestate_town')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('town_id')->type('recordpicker')->table('realestate_town')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-full');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('town_id')->type('recordpicker')->table('realestate_town')->group('w-1/6');

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
        $table->string('name');
        $table->string('description')->nullable();
        $table->foreignId('town_id')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'realestate_town', 'town_id');
    }
}
