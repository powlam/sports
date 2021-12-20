<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
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
        'tournament_id',
        'name',
        'order',
        'type',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'order' => 'integer',
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
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('orderedByEdition', function (Builder $builder) {
            $builder->orderBy('order');
        });
    }

    /** Relationships **/

    /**
     * The related tournament
     */
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

}
