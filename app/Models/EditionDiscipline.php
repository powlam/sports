<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditionDiscipline extends Model
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
     * The related discipline
     */
    public function sportDiscipline()
    {
        return $this->belongsTo(SportDiscipline::class);
    }

}
