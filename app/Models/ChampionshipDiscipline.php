<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChampionshipDiscipline extends Model
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
     * The related discipline
     */
    public function sportDiscipline()
    {
        return $this->belongsTo(SportDiscipline::class);
    }

}
