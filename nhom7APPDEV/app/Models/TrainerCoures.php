<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerCoures extends Model
{
    use HasFactory;
    protected $table='trainee_courses';
    public $primaryKey='id';
    public $timestamps=false;
    protected $fillable = ['user_id', 'course_id'];
}
