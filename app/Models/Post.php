<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $guarded = ["id","created_at"];
    protected $fillable = ["title","body","excerpt","slug","category_id"];

    public function scopeFilter($query,array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query,$search)=>
            $query
                ->where('title','like','%'.$search.'%')
                ->orWhere('excerpt','like','%'.$search.'%')
                ->orWhere('body','like','%'.$search.'%')
        );
        $query->when($filters['search'] ?? false, fn($query,$search)=>
            $query
                ->where('title','like','%'.$search.'%')
                ->orWhere('excerpt','like','%'.$search.'%')
                ->orWhere('body','like','%'.$search.'%')
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}