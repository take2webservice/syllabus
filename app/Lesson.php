<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    const SEMESTERS = [1 => '前期', 2 => '後期'];
    
    const YESNO = [0 => 'いいえ', 1 => 'はい'];
    
    // 0日曜は入らない前提
    // 講義は週1コマのみとする
    const DAY_OF_WEEKS = [1 => '月曜', 2 => '火曜', 3 => '水曜', 4 => '木曜', 5 => '金曜', 61 => '土曜'];
    
    const PERIODS = [1 => '1限', 2 => '2限', 3 => '3限', 4 => '4限', 5 => '5限', 6 => '6限'];
    
    const LESSON_TYPES = [
        ['value' => 1, 'label' => '専門', 'id' => 'is_expert'],
        ['value' => 2, 'label' => '言語', 'id' => 'is_language'],
        ['value' => 3, 'label' => '一般教養', 'id' => 'is_general']
    ];
    
    public function school()
    {
        return $this->belongsTo('App\School');
    }
    
    public function departments()
    {
        return $this->belongsTo('App\Department');
    }
    
    public function getLessonSchedule() {
        return Lesson::DAY_OF_WEEKS[$this->day_of_the_week] . ' ' . Lesson::PERIODS[$this->period];
    }
    
    public function getTeachers() {
        $array = [];
        foreach($this->teachers as $teacher) {
            array_push($array, $teacher->name);
        }
        return implode(",", $array);;
    }
    
    public function getLessonType() {
        foreach(Lesson::LESSON_TYPES as $type) {
            if ($type['value'] === $this->lesson_type) {
                return $type['label'];   
            }
        }
        return "未指定";
    }
    
    public function getSemster() {
        return Lesson::SEMESTERS[$this->semester];
    }
    
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher', 'lesson_teachers', 'lesson_id', 'teacher_id');
    }
}
