<?php

namespace See\Models;

use Illuminate\Database\Eloquent\Model;
use See\Events\EmailBoletimEvent;
use See\Mail\EmailBoletim;

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

    /**
     * CREATED_AT, UPDATED_AT
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'ema_see_ds_email',
        'ema_see_ds_email',
        'ema_see_ds_tipo',
        'ema_see_ds_de',
        'ema_see_ds_exibir',
        'ema_see_ds_assunto',
        'ema_see_ds_para',
        'ema_see_ds_copia',
        'ema_see_ds_lista',
        'ema_see_ds_login'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function(Model $model){
            \Mail::to($model->ema_see_ds_de)->send(new EmailBoletim($model));
        });
    }
}
