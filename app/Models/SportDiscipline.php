<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportDiscipline extends Model
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
        'sport_id',
        'default',
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'default' => 'boolean',
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
     * The related events
     */
    public function sportEvents()
    {
        return $this->hasMany(SportEvent::class);
    }

    /**
     * @return App\Models\SportEvent
     */
    public function defaultEvent()
    {
        return $this->sportEvents->where('default', true)->first();
    }

    /**
     * The related championships
     */
    public function championships()
    {
        return $this->hasManyThrough(Championship::class, ChampionshipDiscipline::class, 'sport_discipline_id', 'id', 'id', 'championship_id');
    }

    /**
     * The related championship editions
     */
    public function championshipEditions()
    {
        return $this->hasManyThrough(ChampionshipEdition::class, EditionDiscipline::class, 'sport_discipline_id', 'id', 'id', 'championship_edition_id');
    }

    /**
     * Get the logo.
     */
    public function logo()
    {
        return $this->morphOne(Logo::class, 'logoable');
    }

    /** Scopes **/

    /**
     * Scope a query to only include default disciplines.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDefault($query)
    {
        return $query->where('default', true);
    }

}
