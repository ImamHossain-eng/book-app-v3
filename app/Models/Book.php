<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'category',
        'number'
    ];
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function dues()
    {
        return $this->hasMany(Due::class);
    }
}
