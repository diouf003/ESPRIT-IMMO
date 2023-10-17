<?php

namespace App\Models;

use App\Models\Article;
use App\Models\DureeLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarification extends Model
{
    use HasFactory;

    protected $fillable = ["article_id", "duree_location_id", "description", "prix"];

    public function DureeLocation()
    {
        return $this->belongsTo(DureeLocation::class, "duree_location_id", "id");
    }

    public function article()
    {
        return $this->belongsTo(Article::class, "article_id", "id");
    }

    //pour le prix

    public function getPrixForHumansAttribute()
    {
        return number_format($this->prix, 0, ",", " ") . " " . env("CURRENCY", "Fcfa");
    }
}
