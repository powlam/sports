<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChampionshipEvent extends Model
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
     * The related event
     */
    public function sportEvent()
    {
        return $this->belongsTo(SportEvent::class);
    }

}
