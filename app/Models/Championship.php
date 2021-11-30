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
        'sport_id',
        'name',
        'genre',
        'type',
        'scope',
        'location',
        'notes',
    ];

    /*****/

    /**
     * The available genres
     *
     * @var string[]
     */
    public static $genres = [
        'M' => 'men',
        'W' => 'women',
        'X' => 'mixed',
    ];

    /**
     * The available types
     *
     * @var string[]
     */
    public static $types = [
        'league',
        'knockout',
    ];

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
     * The related sport
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    /**
     * The related editions
     */
    public function championshipEditions()
    {
        return $this->hasMany(ChampionshipEdition::class);
    }

}
