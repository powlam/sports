<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditionSport extends Model
{
    /** Relationships **/

    /**
     * The related edition
     */
    public function championshipEdition()
    {
        return $this->belongsTo(ChampionshipEdition::class);
    }

    /**
     * The related sport
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

}
