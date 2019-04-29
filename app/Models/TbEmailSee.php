<?php

namespace See\Models;

use Illuminate\Database\Eloquent\Model;

class TbEmailSee extends Model
{
    /**
     * Conection database
     *
     * @var string
     */
    protected $connection = 'sqlsrv-sinpro';

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'tb_email_see';

    protected $fillable = [
        'ema_see_ds_email'
    ];

    const CREATED_AT = 'ema_see_dt_cadastro';

    const UPDATED_AT = false;

//    public $timestamps = false;

}