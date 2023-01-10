<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;


    const TYPE_FIXED = 'fixed';
    const TYPE_HOURLY = 'hourly';

    protected $fillable =[
        'title', 'category_id', 'user_id', 'description', 'budget',
        'status', 'type','attachments',
    ];

    protected $cats = [
        'attachments' =>   'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'user_id','id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,     //related model
            'project_tag',  // pivot table
            'project_id',   // f.k for current model in pivot table
            'tag_id',       // f.k for related model in pivot table
            'id',           // current model key (p.k)
            'id'            // related model key (p.k related model)

        );
    }


    public static function types()
    {
        return [
            self::TYPE_FIXED => 'Fixed',
            self::TYPE_HOURLY => 'Hourly',
        ];
    }

    public function syncTags(array $tags)
    {

        $tags_id =[];
        foreach($tags as $tag_name)
        {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug($tag_name),
            ],[
                'name' => trim($tag_name),
            ]);

            $tag_id[]= $tag->id;
        }

        $this->tags()->sync($tag_id);
    }
}
