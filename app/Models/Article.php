<?php

namespace App\Models;

use App\Models\Location;
use App\Models\TypeArticle;
use App\Models\Tarification;
use App\Models\ArticlePropriete;
use App\Models\ProprieteArticle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    public $fillable = [
        "nom", "noSerie", "types_article_id", "imageUrl"
    ];

    protected $table = "articles";



    public function type()
    {

        return $this->belongsTo(typeArticle::class, "type_article_id", "id");
    }

    public function Tarifications()
    {
        return $this->hasMany(Tarification::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, "article_location", "article_id", "location_id");
    }

    public function proprietes()
    {
        return $this->belongsToMany(ProprieteArticle::class, "article_propriete", "article_id", "propriete_article_id");
    }

    public function article_propriete()
    {
        return $this->hasMany(ArticlePropriete::class);

        //
    }
    public function propriete_articles()
    {
        return $this->hasMany(ProprieteArticle::class);

        //
    }




    public function types_article()
    {
        return $this->belongsTo(TypeArticle::class);
    }
}
