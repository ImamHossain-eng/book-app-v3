<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varsity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'contact'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
