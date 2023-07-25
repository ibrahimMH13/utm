<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
       return 'slug';
    }

    public function getNameAttribute($name)
    {
        switch ($name){
            case 'SOFTWARE CONSTRUCTIONS':
                return "<span class='bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300'>$name</span>";
            case 'INFORMATICS IN SOCIETY':
                return "<span class='bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300'>$name</span>";
            case 'SOFTWARE PROJECT & CONFIGURATION MANAGEMENT':
                return "<span class='bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300'>$name</span>";
            case 'SOFTWARE QUALITY ASSURANCE':
                return "<span class='bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-purple-900 dark:text-purple-300'>$name</span>";
            case 'SOFTWARE DESIGN':
                return "<span class='bg-pink-100 text-pink-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-pink-900 dark:text-pink-300'>$name</span>";
            case 'SOFTWARE REQUIREMENTS':
                return "<span class='bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300'>$name</span>";
            default:
            return "<span class='bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300'>$name</span>";
        }
    }
}
