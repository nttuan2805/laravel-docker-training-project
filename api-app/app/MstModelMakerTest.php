<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstModelMakerTest extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql2';
    /**
     * The table associated with the model  
     *
     * @var string
     */
    protected $table = 'mst_model_maker';

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
