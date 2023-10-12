<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\department;

class student extends Model
{
    use HasFactory;
    protected $table='student';

    protected $guarded =[
        // 'name',
        // 'course',
        // 'email',
        // 'phone',
        // 'department_id'
    ];

    public function department(){
        return $this->hasOne(department::class, 'id', 'department_id');
        // return $this->hasOne(deprtment::class,"id","department_id");
    }
    public function subject(){
        return $this->belongsToMany(subject::class, 'student_subject', 'student_id','subject_id');
        // return $this->hasOne(deprtment::class,"id","department_id");
    }

}
