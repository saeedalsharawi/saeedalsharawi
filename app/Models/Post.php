<?php

namespace App\Models;




use Illuminate\Support\Facades\File;
use Spatie\YamlFronMatter\YamlFronMatter;


class Post
{
    public String $title ;
    public String $body ;
    public String $date ;
    public String $slug ;

    public function __construct($title ,$body, $date,$slug ){
        $this->title = $title ;
        $this->body = $body ;
        $this->date = $date ;
        $this->$slug = $slug ;
    }


    public static function find($slug){
        return static::all()->firstWhere('slug',$slug);
 }


    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {


            return collect(File::files(resource_path('posts')))->map(function ($file) {


                $object = YamlFrontMatter::parseFile($file);
                return new Post(
                    $object->matter("title"),
                    $object->body(),
                    $object->matter("date"),
                    $object->matter("slug")

                );

            })->sortBy('date');
        });
    }
}





