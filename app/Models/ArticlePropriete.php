<?php

namespace App\Models;


use App\Models\ProprieteArticle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticlePropriete extends Model
{
    use HasFactory;

    public $table = "article_propriete";


    protected $fillable = [
        "article_id",
        "propriete_article_id",
        "valeur"
    ];

    public function propriete()
    {
        return $this->hasOne(ProprieteArticle::class,  'id', 'propriete_article_id');
    }

    public function articles()
    {
        return $this->hasOne(TypeArticle::class,  'id', 'types_article_id');
    }
    // // ajout
    // public function type()
    // {
    //     return $this->hasOne(TypeArticle::class);
    // }
}
