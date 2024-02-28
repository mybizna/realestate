<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->foreignId('tenancy_id')->nullable()->html('recordpicker')->relation(['realestate', 'tenancy']);
        $this->fields->foreignId('invoice_id')->nullable()->html('recordpicker')->relation(['account', 'invoice']);
        $this->fields->integer('reading')->html('text');
        $this->fields->integer('units')->html('text');
        $this->fields->char('billing_period', 20)->nullable()->html('number');
        $this->fields->dateTime('billing_date')->nullable()->html('date');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['name', 'tenancy_id', 'invoice_id', 'reading', 'units', 'billing_period', 'billing_date'];
        $structure['form'] = [
            ['label' => 'Reading Water Name', 'class' => 'col-span-full', 'fields' => ['name']],
            ['label' => 'Water Reading', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['reading', 'units']],
            ['label' => 'Reading Water Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['tenancy_id', 'invoice_id']],
            ['label' => 'Reading Water Date', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['billing_period', 'billing_date']],
        ];
        $structure['filter'] = ['name', 'tenancy_id', 'invoice_id'];

        return $structure;
    }

}
