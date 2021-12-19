<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

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
        'championship_edition_id',
        'sport_event_id',
        'genre',
        'type',
        'state',
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
        'league' => 'league',
        'knockout' => 'knockout',
    ];

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
     * The related championship edition
     */
    public function championshipEdition()
    {
        return $this->belongsTo(ChampionshipEdition::class);
    }

    /**
     * The related sport event
     */
    public function sportEvent()
    {
        return $this->belongsTo(SportEvent::class);
    }

    /**
     * Get the logo.
     */
    public function logo()
    {
        return $this->morphOne(Logo::class, 'logoable');
    }

    /** Accessors **/

    /**
     * Get the name of the tournament. Constructed
     *
     * @return string
     */
    public function getNameAttribute()
    {
        $name = [];
        $name[] = $this->championshipEdition->full_name;
        if ($this->championshipEdition->sportEvents->count() > 1) {
            $name[] = $this->sportEvent->name;
            $name[] = $this->genre;
        }
        return implode(' - ', $name);
    }

    /*****/

    /**
     * All the editions of this tournament
     * They share Championship, SportEvent and genre
     * 
     * @return App\Models\Tournament[]
     */
    public function editions()
    {
        return Tournament::whereIn('championship_edition_id', ChampionshipEdition::where('championship_id', $this->championshipEdition->championship_id)->pluck('id'))
            ->where('sport_event_id', $this->sport_event_id)
            ->where('genre', $this->genre)
            ->orderBy(
                ChampionshipEdition::select('edition')
                    ->whereColumn('id', 'tournaments.championship_edition_id')
                    ->orderBy('edition')
                    ->limit(1)
            )
            ->get();
    }

    /**
     * The previous edition of this tournament
     * They share Championship, SportEvent and genre; and the ChampionshipEdition::$edition is 1 below
     * 
     * @return App\Models\Tournament|null
     */
    public function previousEdition()
    {
        if (!($previousChampionshipEdition = $this->championshipEdition->previous())) {
            return null;
        }
        return Tournament::where('championship_edition_id', $previousChampionshipEdition->id)
            ->where('sport_event_id', $this->sport_event_id)
            ->where('genre', $this->genre)
            ->first();
    }

    /**
     * The next edition of this tournament
     * They share Championship, SportEvent and genre; and the ChampionshipEdition::$edition is 1 above
     * 
     * @return App\Models\Tournament|null
     */
    public function nextEdition()
    {
        if (!($nextChampionshipEdition = $this->championshipEdition->next())) {
            return null;
        }
        return Tournament::where('championship_edition_id', $nextChampionshipEdition->id)
            ->where('sport_event_id', $this->sport_event_id)
            ->where('genre', $this->genre)
            ->first();
    }

}
