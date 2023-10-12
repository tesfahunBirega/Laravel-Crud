<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class subject extends Model
{
    use HasFactory;
    protected $table='subject';

    protected $guarded = [];

    public function student(){
        return $this->belongsToMany(student::class, 'student_subject', 'subject_id','student_id');
        // return $this->hasOne(deprtment::class,"id","department_id");
    }

}
