<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom' , 'email' , 'photo'];

    public function notes(){
        return $this->hasMany(note::class);
    }
}
