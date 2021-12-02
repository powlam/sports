<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChampionshipSport extends Model
{
    /** Relationships **/

    /**
     * The related championship
     */
    public function championship()
    {
        return $this->belongsTo(Championship::class);
    }

    /**
     * The related sport
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

}
