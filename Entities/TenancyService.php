<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class TenancyService extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['title', 'tenancy_id', 'amount', 'billing_date'];

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
    public array $migrationDependancy = ['realestate_tenancy'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_tenancy_service";

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
        $this->fields->foreignId('tenancy_id')->nullable()->html('recordpicker')->table(['realestate', 'tenancy']);
        $this->fields->double('amount', 8, 2)->nullable()->html('number');
        $this->fields->dateTime('billing_date')->nullable()->html('date');
    }

}
