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
     * The related sport
     */
    public function sport()
    {
        return $this->hasOneThrough(Sport::class, SportDiscipline::class);
    }

}
