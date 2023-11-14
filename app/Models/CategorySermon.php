<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class CategorySermon extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'created_at'=>'datetime'
    ];
    public function sermons(){
        return $this->hasMany(Sermon::class);
    }

    protected static function booted(){
        parent::boot();
        static::deleting(function($category){
        
            //je selectionne les autres categories
            $ids = self::query()->whereKeyNot($category->id)
            ->pluck("id");
        
            if($ids->count()){
                $id = $ids->random();
                $category->sermons()->update(['category_sermon_id'=>$id]);
            }else{
                throw ValidationException::withMessages(['message'=>config('app.msg_error_cat_vide')]);
            }
        });
    }
}
