<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
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
