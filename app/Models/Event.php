<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory , SoftDeletes;


    protected $casts = [
        "start_at"=>"datetime"
    ];

    function getAuthorAttribute(){
        return $this->user->name;
    }

    function user(){
        return $this->belongsTo(User::class);
    }
    function scopeActive($builder){
        $builder->where('start_at','>',now());
    }
    function scopeInactive($builder){
        $builder->where('start_at','<',now());
    }
}
