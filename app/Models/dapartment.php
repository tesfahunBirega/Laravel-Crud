<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dapartment extends Model
{
    use HasFactory;
protected $table='department';


    protected $fillable =[
        'Department-Name',
        'student_id'
    ];
    public function student(){
        return $this->belongsTo(student::class);
    }
}
