<?php

namespace App\Models;

use App\Filter\Filters\PostFilters;
use Database\Factories\PostFactory;
use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
      'title',
      'slug',
      'body',
      'user_id',
      'is_publish',
      'photo_name',
    ];
   public static $rule = [
            'title' => 'required',
            'tags' => 'required',
            'body' => 'required',
            'is_publish' => 'nullable',
            ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeMainActivePost($query){
            return $query->where('is_publish',true)->filter(request());
    }

    public function scopeLastPost($query){
        return  $query->orderBy('id','desc');
    }

    public function scopeFilter(Builder $builder,Request $request,$otherFilters =[]){
        return (new PostFilters($request))->add($otherFilters)->filter($builder);
    }

}
