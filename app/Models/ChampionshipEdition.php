<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('orderedByEdition', function (Builder $builder) {
            $builder->orderBy('edition');
        });
    }

    /** Relationships **/

    /**
     * The related championship
     */
    public function championship()
    {
        return $this->belongsTo(Championship::class);
    }

    /**
     * The related events
     */
    public function sportEvents()
    {
        return $this->belongsToMany(SportEvent::class, 'tournaments')->as('tournament')->withPivot('genre', 'type', 'state');
    }

    /**
     * The related sports
     */
    public function sports()
    {
        return $this->hasManyThrough(Sport::class, EditionSport::class, 'championship_edition_id', 'id', 'id', 'sport_id');
    }

    /**
     * The related sport disciplines
     */
    public function sportDisciplines()
    {
        return $this->hasManyThrough(SportDiscipline::class, EditionDiscipline::class, 'championship_edition_id', 'id', 'id', 'sport_discipline_id');
    }

    /** Accessors **/

    /**
     * Get the full name (path).
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $full_name = [];
        $full_name[] = $this->championship->name;
        if ($this->championship->name !== $this->name) {
            $full_name[] = $this->name;
        }
        return implode(' - ', $full_name).($this->edition > 1 ? " ({$this->edition})" : '');
    }

    /*****/

    /**
     * The previous edition of this championship
     * 
     * @return App\Models\ChampionshipEdition
     */
    public function previous()
    {
        return ChampionshipEdition::where('championship_id', $this->championship_id)
            ->where('edition', $this->edition - 1)
            ->first();
    }

    /**
     * The next edition of this championship
     * 
     * @return App\Models\ChampionshipEdition
     */
    public function next()
    {
        return ChampionshipEdition::where('championship_id', $this->championship_id)
            ->where('edition', $this->edition + 1)
            ->first();
    }

    /**
     * Get the logo.
     */
    public function logo()
    {
        return $this->morphOne(Logo::class, 'logoable');
    }

}
