<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
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
        'name',
    ];

    /** Relationships **/

    /**
     * The related disciplines
     */
    public function sportDisciplines()
    {
        return $this->hasMany(SportDiscipline::class);
    }

    /**
     * @return App\Models\SportDiscipline
     */
    public function defaultDiscipline()
    {
        return $this->sportDisciplines->where('default', true)->first();
    }

    /**
     * The related events
     */
    public function sportEvents()
    {
        return $this->hasManyThrough(SportEvent::class, SportDiscipline::class);
    }

    /**
     * The related championships
     */
    public function championships()
    {
        return $this->hasManyThrough(Championship::class, ChampionshipSport::class, 'sport_id', 'id', 'id', 'championship_id');
    }

    /**
     * The related championship editions
     */
    public function championshipEditions()
    {
        return $this->hasManyThrough(ChampionshipEdition::class, EditionSport::class, 'sport_id', 'id', 'id', 'championship_edition_id');
    }

    /**
     * Get the logo.
     */
    public function logo()
    {
        return $this->morphOne(Logo::class, 'logoable');
    }

}
