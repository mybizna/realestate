<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Tenancy extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'description', 'unit_id', 'partner_id', 'type', 'amount', 'deposit', 'goodwill', 'rooms', 'billing_date', 'is_merged_bill', 'is_started', 'is_closed', 'bill_gas', 'bill_water', 'bill_electricity'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['realestate_unit', 'partner'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_tenancy";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('unit_id')->type('recordpicker')->table('realestate_unit')->ordering(true);
        $fields->name('partner_id')->type('recordpicker')->table('partner')->ordering(true);
        $fields->name('type')->type('select')->options(['weekly' => 'Weekly', 'bi_weekly' => 'Bi Weekly', 'monthly' => 'Monthly', 'quarterly' => 'Quarterly', 'bi_annually' => 'Bi Annually', 'annually' => 'Annually'])->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('rooms')->type('text')->ordering(true);
        $fields->name('billing_date')->type('date')->ordering(true);
        $fields->name('is_merged_bill')->type('switch')->ordering(true);
        $fields->name('is_started')->type('switch')->ordering(true);

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

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('description')->type('text')->group('w-1/2');
        $fields->name('unit_id')->type('recordpicker')->table('realestate_unit')->group('w-1/2');
        $fields->name('partner_id')->type('recordpicker')->table('partner')->group('w-1/2');
        $fields->name('type')->type('select')->options(['weekly' => 'Weekly', 'bi_weekly' => 'Bi Weekly', 'monthly' => 'Monthly', 'quarterly' => 'Quarterly', 'bi_annually' => 'Bi Annually', 'annually' => 'Annually'])->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('deposit')->type('text')->group('w-1/2');
        $fields->name('goodwill')->type('text')->group('w-1/2');
        $fields->name('rooms')->type('text')->group('w-1/2');
        $fields->name('billing_date')->type('date')->group('w-1/2');
        $fields->name('is_merged_bill')->type('switch')->group('w-1/2');
        $fields->name('is_started')->type('switch')->group('w-1/2');
        $fields->name('is_closed')->type('switch')->group('w-1/2');
        $fields->name('bill_gas')->type('switch')->group('w-1/2');
        $fields->name('bill_water')->type('switch')->group('w-1/2');
        $fields->name('bill_electricity')->type('switch')->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining list of fields in form view.
     * 
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('description')->type('text')->group('w-1/6');
        $fields->name('unit_id')->type('recordpicker')->table('realestate_unit')->group('w-1/6');
        $fields->name('partner_id')->type('recordpicker')->table('partner')->group('w-1/6');
        $fields->name('type')->type('select')->options(['weekly' => 'Weekly', 'bi_weekly' => 'Bi Weekly', 'monthly' => 'Monthly', 'quarterly' => 'Quarterly', 'bi_annually' => 'Bi Annually', 'annually' => 'Annually'])->group('w-1/6');
        $fields->name('amount')->type('text')->group('w-1/6');

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
        $table->string('title');
        $table->string('description')->nullable();
        $table->foreignId('unit_id')->nullable();
        $table->foreignId('partner_id')->nullable();
        $table->enum('type', ['weekly', 'bi_weekly', 'monthly', 'quarterly', 'bi_annually', 'annually'])->default('monthly');
        $table->double('amount', 8, 2)->nullable();
        $table->double('deposit', 8, 2)->nullable();
        $table->double('goodwill', 8, 2)->nullable();
        $table->integer('rooms');
        $table->dateTime('billing_date')->nullable();
        $table->boolean('is_merged_bill')->default(true)->nullable();
        $table->boolean('is_started')->default(0)->nullable();
        $table->boolean('is_closed')->default(0)->nullable();
        $table->boolean('bill_gas')->default(0)->nullable();
        $table->boolean('bill_water')->default(0)->nullable();
        $table->boolean('bill_electricity')->default(0)->nullable();
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
        Migration::addForeign($table, 'realestate_unit', 'unit_id');
        Migration::addForeign($table, 'partner', 'partner_id');
    }

}
