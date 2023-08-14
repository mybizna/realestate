<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
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
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['title'];

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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {

        $this->fields->increments('id')->html('text');
        $this->fields->string('title')->html('text');
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->foreignId('unit_id')->nullable()->html('recordpicker')->table(['realestate', 'unit']);
        $this->fields->foreignId('partner_id')->nullable()->html('recordpicker')->table(['partner']);
        $this->fields->enum('type', ['weekly', 'bi_weekly', 'monthly', 'quarterly', 'bi_annually', 'annually'])->default('monthly')->html('select');
        $this->fields->double('amount', 8, 2)->nullable()->html('amount');
        $this->fields->double('deposit', 8, 2)->nullable()->html('amount');
        $this->fields->double('goodwill', 8, 2)->nullable()->html('amount');
        $this->fields->integer('rooms')->html('number');
        $this->fields->dateTime('billing_date')->nullable()->html('date');
        $this->fields->boolean('is_merged_bill')->default(true)->nullable()->html('switch');
        $this->fields->boolean('is_started')->default(0)->nullable()->html('switch');
        $this->fields->boolean('is_closed')->default(0)->nullable()->html('switch');
        $this->fields->boolean('bill_gas')->default(0)->nullable()->html('switch');
        $this->fields->boolean('bill_water')->default(0)->nullable()->html('switch');
        $this->fields->boolean('bill_electricity')->default(0)->nullable()->html('switch');
    }

}
