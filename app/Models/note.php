<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    use HasFactory;
    protected $fillable = ['student_id' , 'matiere' , 'note'];

    public function student(){
        return $this->belongsTo(student::class,'student_id');
    }

}
