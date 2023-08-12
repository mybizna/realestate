<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class ReadingWater extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'tenancy_id', 'invoice_id', 'reading', 'units', 'billing_period', 'billing_date'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['name'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['account_invoice', 'realestate_tenancy'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_reading_water";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->type('text')->ordering(true);
        $fields->name('tenancy_id')->type('recordpicker')->table('realestate_tenancy')->ordering(true);
        $fields->name('invoice_id')->type('recordpicker')->table('account_invoice')->ordering(true);
        $fields->name('reading')->type('text')->ordering(true);
        $fields->name('units')->type('text')->ordering(true);
        $fields->name('billing_period')->type('text')->ordering(true);
        $fields->name('billing_date')->type('date')->ordering(true);

        return $fields;

    }

    /**
     * Function for defining list of fields in form view.
     *
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/2');
        $fields->name('tenancy_id')->type('recordpicker')->table('realestate_tenancy')->group('w-1/2');
        $fields->name('invoice_id')->type('recordpicker')->table('account_invoice')->group('w-1/2');
        $fields->name('reading')->type('text')->group('w-1/2');
        $fields->name('units')->type('text')->group('w-1/2');
        $fields->name('billing_period')->type('text')->group('w-1/2');
        $fields->name('billing_date')->type('date')->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining list of fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/6');
        $fields->name('tenancy_id')->type('recordpicker')->table('realestate_tenancy')->group('w-1/6');
        $fields->name('invoice_id')->type('recordpicker')->table('account_invoice')->group('w-1/6');
        $fields->name('reading')->type('text')->group('w-1/6');
        $fields->name('units')->type('text')->group('w-1/6');
        $fields->name('billing_period')->type('text')->group('w-1/6');
        $fields->name('billing_date')->type('date')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
    {
        $table->increments('id');
        $table->foreignId('tenancy_id')->nullable();
        $table->foreignId('invoice_id')->nullable();
        $table->integer('reading');
        $table->integer('units');
        $table->char('billing_period', 20)->nullable();
        $table->dateTime('billing_date')->nullable();
    }

    /**
     * Handle post migration processes for adding foreign keys.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function post_migration(Blueprint $table): void
    {
        Migration::addForeign($table, 'account_invoice', 'invoice_id');
        Migration::addForeign($table, 'realestate_tenancy', 'tenancy_id');
    }
}
