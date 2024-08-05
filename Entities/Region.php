<?php

namespace Modules\Realestate\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class Region extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'slug', 'description', 'country_id', 'state_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "realestate_region";

 

 


 

}
