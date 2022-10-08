<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //Add fillable property to allow mass assignment
    protected $fillable = [
        'title',
        'company',
        'location',
        'website',
        'email',
        'tags',
        'description'
    ];

    //filter model by tag
    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false){
            $query->where('tags','like','%'.request('tag').'%'); //sqlite query for tag between anything %
        }

        if($filters['search'] ?? false){
            //select columns to search
            $query->where('title','like','%'.request('search').'%')
                ->orWhere('description','like','%'.request('search').'%')
                ->orWhere('tags','like','%'.request('search').'%')
                ->orWhere('location','like','%'.request('search').'%')
                ->orWhere('email','like','%'.request('search').'%')
                ->orWhere('website','like','%'.request('search').'%');
        }
    }

}
