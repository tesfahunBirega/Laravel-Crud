<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table='student';

    protected $fillable=[
        'name',
        'course',
        'email',
        'phone'
    ];
public function department(){
    return $this->hasone(deprtment::class);
}
}
