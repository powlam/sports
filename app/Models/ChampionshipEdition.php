<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampionshipEdition extends Model
{
    use HasFactory;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [ 
        'id', 
        'championship_id',
        'name',
        'edition',
        'start',
        'end',
        'state',
        'location',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'edition' => 'integer',
        'start' => 'datetime:Y-m-d',
        'end' => 'datetime:Y-m-d',
        'state' => 'integer',
    ];

    /*****/

    /**
     * The possible states
     *
     * @var string[]
     */
    public static $states = [
        1 => 'not started',
        2 => 'running',
        3 => 'ended',
    ];

    /** Relationships **/

    /**
     * The related championship
     */
    public function championship()
    {
        return $this->belongsTo(Championship::class);
    }

}
