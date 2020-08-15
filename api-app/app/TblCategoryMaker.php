<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblCategoryMaker extends Model
{
    /**
     * The table associated with the model  
     *
     * @var string
     */
    protected $table = 'tbl_category_maker';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'category_maker_code';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
