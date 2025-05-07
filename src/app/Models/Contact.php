<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','gender','email','tel1','tel2','tel3','address','building','category_id','message',
];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id){
        if(!empty($category_id)){
            $query->where('category_id',$category_id);
        }
    }

    public function scopeKeywordSearch($query,$keyword){
        if(!empty($keyword)){
            $query->where(function($q) use ($keyword, $matchType) {
            $operator = $matchType === 'exact' ? '=' : 'like';
            $value = $matchType === 'exact' ? $keyword : '%' . $keyword . '%';

            $q->where('last_name', $operator, $value)
            ->orWhere('first_name', $operator, $value)
            ->orWhere('email', $operator, $value);
        });
    }

    public function user(){
    return $this->belongsTo(User::class);
}
}
}
