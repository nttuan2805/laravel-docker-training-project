<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstModelV2 extends Model
{
    /**
     * The table associated with the model  
     *
     * @var string
     */
    protected $table = 'mst_model_v2';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'model_code';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
