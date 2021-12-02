<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
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
        'name',
        'scope',
        'location',
        'notes',
    ];

    /*****/

    /**
     * The available scopes
     *
     * @var string[]
     */
    public static $scopes = [
        'national',
        'continental',
        'world',
    ];

    /** Relationships **/

    /**
     * The related editions
     */
    public function championshipEditions()
    {
        return $this->hasMany(ChampionshipEdition::class);
    }

}
