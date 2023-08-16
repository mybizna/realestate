<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class ReadingGas extends BaseModel
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
    protected $table = "realestate_reading_gas";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
        $this->fields->foreignId('tenancy_id')->nullable()->html('recordpicker')->relation(['realestate', 'tenancy']);
        $this->fields->foreignId('invoice_id')->nullable()->html('recordpicker')->relation(['account', 'invoice']);
        $this->fields->integer('reading')->html('text');
        $this->fields->integer('units')->html('text');
        $this->fields->char('billing_period', 20)->nullable()->html('text');
        $this->fields->dateTime('billing_date')->nullable()->html('date');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        //'name', 'tenancy_id', 'invoice_id', 'reading', 'units', 'billing_period', 'billing_date'
        $structure = [
            'table' => ['name', 'tenancy_id', 'invoice_id', 'reading', 'units', 'billing_period', 'billing_date'],
            'form' => [
                ['label' => 'Name', 'class' => 'w-full', 'fields' => ['name']],
                ['label' => 'Reading', 'class' => 'w-1/2', 'fields' => ['reading', 'units']],
                ['label' => 'Setting', 'class' => 'w-1/2', 'fields' => ['tenancy_id', 'invoice_id']],
                ['label' => 'Date', 'class' => 'w-1/2', 'fields' => ['billing_period', 'billing_date']],
            ],
            'filter' => ['name', 'tenancy_id', 'invoice_id'],
        ];

        return $structure;
    }

}
