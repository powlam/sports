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
        'league',
        'knockout',
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

    /*****/

    /**
     * All the editions of this tournament
     * 
     * @return App\Models\Tournament[]
     */
    //TODO public function editions()

    /**
     * The previous edition of this tournament
     * 
     * @return App\Models\Tournament
     */
    //TODO public function previousEdition()

    /**
     * The next edition of this tournament
     * 
     * @return App\Models\Tournament
     */
    //TODO public function nextEdition()

}
