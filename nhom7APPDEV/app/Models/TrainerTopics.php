<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerTopics extends Model
{
    use HasFactory;

    protected $table='trainer_topics';
    public $primaryKey='id';
    public $timestamps=false;
    protected $fillable = ['user_id', 'topic_id'];
}
