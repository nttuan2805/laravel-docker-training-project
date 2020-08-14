<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstModelMaker extends Model
{
    /**
     * The table associated with the model  
     *
     * @var string
     */
    protected $table = 'mst_model_makers';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'model_maker_code';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
