<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
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
        'image',
        'logoable_id',
        'logoable_type',
    ];

    /** Relationships **/

    /**
     * Get the parent logoable model.
     */
    public function logoable()
    {
        return $this->morphTo();
    }

    /*****/

    /**
     * Converts image to base64 to allow to store it into database (https://stackoverflow.com/a/13758760)
     * To display it: http://stackoverflow.com/questions/8499633/how-to-display-base64-images-in-html
     * 
     * @param string $path Path to the image
     * @return string Base-64 encoded image
     */
    public static function convertImageForDatabase($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;        
    }

}
