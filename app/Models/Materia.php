<?php

namespace See\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    /**
     * Conection database
     *
     * @var string
     */
    protected $connection = 'sqlsrv-sinpro';

    /**
     * Table
     * @var string
     */
    protected $table = 'Materia';
}
