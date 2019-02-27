<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function school()
    {
        return $this->belongsTo('App\School');
    }
    
    public function schoolName()
    {
        if (empty($this->school))
        {
            return "未設定";
        }
        return $this->school->name;
    }
}
