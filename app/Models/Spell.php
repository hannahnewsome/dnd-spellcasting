<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Spell extends Eloquent
{
    use HasFactory;

    protected $table = 'spells';

    //temporary until I have time to clean up the data & schema
    public $incrementing = false;
    protected $primaryKey = 'Name';
    protected $keyType = 'string';
    public $timestamps = false;

    /**
     * non-mass-assignable attributes
     *
     * @var array
     */
    protected $guarded = [
        'name',
    ];

}
