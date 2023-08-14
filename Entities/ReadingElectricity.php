<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class ReadingElectricity extends BaseModel
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
    public array $migrationDependancy = ['realestate_tenancy', 'account_invoice'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_reading_electricity";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->html('text')->ordering(true);
        $fields->name('tenancy_id')->html('recordpicker')->table(['realestate', 'tenancy'])->ordering(true);
        $fields->name('invoice_id')->html('recordpicker')->table(['account', 'invoice'])->ordering(true);
        $fields->name('reading')->html('text')->ordering(true);
        $fields->name('units')->html('text')->ordering(true);
        $fields->name('billing_period')->html('text')->ordering(true);
        $fields->name('billing_date')->html('date')->ordering(true);

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

        $fields->name('name')->html('text')->group('w-1/2');
        $fields->name('tenancy_id')->html('recordpicker')->table(['realestate', 'tenancy'])->group('w-1/2');
        $fields->name('invoice_id')->html('recordpicker')->table(['account', 'invoice'])->group('w-1/2');
        $fields->name('reading')->html('text')->group('w-1/2');
        $fields->name('units')->html('text')->group('w-1/2');
        $fields->name('billing_period')->html('text')->group('w-1/2');
        $fields->name('billing_date')->html('date')->group('w-1/2');

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

        $fields->name('name')->html('text')->group('w-1/6');
        $fields->name('tenancy_id')->html('recordpicker')->table(['realestate', 'tenancy'])->group('w-1/6');
        $fields->name('invoice_id')->html('recordpicker')->table(['account', 'invoice'])->group('w-1/6');

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
        $this->fields->increments('id');
        $this->fields->integer('reading');
        $this->fields->foreignId('tenancy_id')->nullable();
        $this->fields->foreignId('invoice_id')->nullable();
        $this->fields->integer('units');
        $this->fields->char('billing_period', 20)->nullable();
        $this->fields->dateTime('billing_date')->nullable();
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
        Migration::addForeign($table, 'realestate_tenancy', 'tenancy_id');
        Migration::addForeign($table, 'account_invoice', 'invoice_id');
    }
}
