<?php

namespace App\Models;

use App\Models\Article;
use App\Models\ProprieteArticle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeArticle extends Model
{
    use HasFactory;

    protected $table = "type_articles";

    protected $fillable = ["newTypeArticleName", "nom"];

    public function articles()
    {
        return $this->hasMany(Article::class, "types_article_id", "id");
    }


    public function proprietes()
    {
        return $this->hasMany(ProprieteArticle::class);
    }
    // public function type()
    // {
    //     return $this->hasMany(ProprieteArticle::class, "type_articles", "id");
    // }
}
