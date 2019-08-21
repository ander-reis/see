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

    protected $primaryKey = 'ema_see_cd_observacao';

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
        'ema_see_ds_materia',
        'ema_see_ds_login'
    ];

    /**
     * Mutators formata data
     *
     * @return string
     * @throws \Exception
     */
    public function getDtEnvioFormattedAttribute()
    {
        return (new \DateTime($this->ema_see_dt_inicio))->format('d/m/Y H:i');
    }

    /**
     * Array para preencher radio option
     *
     * @return array
     */
    static function checkboxOption()
    {
        return [
            'Luiz Antônio Barbagli'         => ['id' => 'labarbagli', 'option' => false],
            'Antônio Carlos'                => ['id' => 'acarlos', 'option' => false],
            'Silvia Celeste Barbará'        => ['id' => 'silvia', 'option' => false],
            'Maria Sofia Cesar de Aragão'   => ['id' => 'sofia', 'option' => false],
            'Ailton Fernandes'              => ['id' => 'ailton', 'option' => false],
            'Gabriela Bueno de Moura'       => ['id' => 'gabriela', 'option' => false],
            'Diretoria SinproSP'            => ['id' => 'diretoria', 'option' => false]
        ];
    }

    /**
     * Array para preencher select multiple
     *
     * @return array
     */
    static function selectOption()
    {
        return [
            'sesi'          => 'SESI',
            'senai'         => 'SENAI',
            'senac'         => 'SENAC',
            'basico'        => 'Básico',
            'superior'      => 'Superior',
            'escbasico'     => 'Escola - Básico',
            'escsuperior'   => 'Escola - Superior',
            'materia'       => 'Matéria',
            'sql'           => 'SQL',
            'tabela'        => 'E-mails na tabela',
        ];
    }
}
