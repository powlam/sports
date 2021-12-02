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

    /**
     * The related sports
     */
    public function sports()
    {
        return $this->hasManyThrough(Sport::class, ChampionshipSport::class, 'championship_id', 'id', 'id', 'sport_id');
    }

    /**
     * The related sport disciplines
     */
    public function sportDisciplines()
    {
        return $this->hasManyThrough(SportDiscipline::class, ChampionshipDiscipline::class, 'championship_id', 'id', 'id', 'sport_discipline_id');
    }

    /**
     * The related sport events
     */
    public function sportEvents()
    {
        return $this->hasManyThrough(SportEvent::class, ChampionshipEvent::class, 'championship_id', 'id', 'id', 'sport_event_id');
    }

}
