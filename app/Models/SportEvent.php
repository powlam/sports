<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportEvent extends Model
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
        'sport_discipline_id',
        'default',
        'name',
        'description',
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
     * The related discipline
     */
    public function sportDiscipline()
    {
        return $this->belongsTo(SportDiscipline::class);
    }

    /**
     * The related editions
     */
    public function championshipEditions()
    {
        return $this->belongsToMany(ChampionshipEdition::class, 'tournaments')->as('tournament')->withPivot('genre', 'type', 'state');
    }

    /**
     * The related championships
     */
    public function championships()
    {
        return $this->hasManyThrough(Championship::class, ChampionshipEvent::class, 'sport_event_id', 'id', 'id', 'championship_id');
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
     * Get the full name (path).
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $full_name = [];
        $full_name[] = $this->sportDiscipline->full_name;
        if (!$this->default || ($this->sportDiscipline->name !== $this->name)) {
            $full_name[] = $this->name;
        }
        return implode(' - ', $full_name);
    }

}
