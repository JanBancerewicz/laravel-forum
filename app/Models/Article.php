<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Exceptions\InvalidArgumentException;
use Illuminate\Support\Str;

/**
 * Article model.
 * 
 * @property string $title
 * @property string $idToken
 * @property string $content
 * @property string $tag
 * @property string $authorId
 */
class Article extends Model
{
    use HasFactory;

    protected const AVAILABLE_TAGS =[
        'Animals','Anime','Art','Cars','Crafts','Fashion','Food','Gaming','History','Hobbies','Law','Learning','Movies','Music','Politics','Programming','Sports','Reading','Science','Technology','Travel'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title', 'idToken', 'content', 'tag', 'authorId'
    ];

    public function getRouteKeyName(){
        return "idToken";
    }

    public static function getAvailableTags(){
        
        return array_values(self::AVAILABLE_TAGS);
    }

    public static function getTagCount(){
        
        return count(self::AVAILABLE_TAGS);
    } 


    public function setIdToken(string $idToken)
    {
        $articleIdToken = Str::slug($idToken);
        $matchingTokens = Article::select('idToken')
            ->where('idToken', "LIKE", "$articleIdToken%")->get();

        if($matchingTokens->isNotEmpty()){
            $matchingCount = $matchingTokens->count();
            $articleIdToken = Str::slug("{$articleIdToken}-{$matchingCount}");
        }

        // $this->attributes['idToken'] = Str::slug($idToken);
        return Str::slug($articleIdToken);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function(Article $article){
            $article->idToken = $article->setIdToken($article->title);
        });

        static::updating(function(Article $article){
            $article->idToken = $article->setIdToken($article->title);
        });
    }

    // public static function getStatus(string $key){
    //     if(!array_key_exists($key, self::AVAILABLE_TAGS)){
    //         throw new InvalidArgumentException(
    //             sprintf("Status for key [%s] does not exist.", $key)
    //         );
    //     }

    //     return self::AVAILABLE_TAGS[$key];
    // }

    
}
