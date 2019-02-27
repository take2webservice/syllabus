<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    const POSITIONS = [1 => '教授', 2 => '准教授', 3 => '講師', 4 => '助教', 5 => '助手'];
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'school_id', 'position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function lessons()
    {
        return $this->belongsToMany('App\Lesson', 'lesson_teachers', 'teacher_id', 'lesson_id');
    }
}
