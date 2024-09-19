<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    protected $with = ['category'];

    public function scopeFilter($query, array $filters){

        $query->when(($filters['search']) ?? false, function($query, $search){
            return $query->where('name','like','%'. $search . '%')
                  ->orWhere('description','like','%'. $search . '%');
        });
        $query->when(($filters['category']) ?? false, function($query, $category){
            return $query->whereHas('category', function($query)  use ($category){
                $query->where('category_name', $category);
            });
        });
       
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
