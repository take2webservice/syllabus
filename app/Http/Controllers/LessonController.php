<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Department;
use App\School;
use App\LessonTeacher;
use App\Teacher;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $freeword = $request->freeword;
        $lessons = Lesson::orderBy('id', 'desc');
        if (!empty($freeword)) {
            $lessons = $lessons->where('name', 'LIKE', "%$freeword%");
        }

        $school_id = $request->school_id;;
        if (!empty($school_id)) {
            $lessons = $lessons->where('school_id', $school_id);
        }
        
        return view('lessons.index', ['lessons' => $lessons->simplePaginate(10), 'freeword' => $freeword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lesson = new Lesson;
        $schools = School::orderBy('ord', 'ASC')->get();
        $teachers = $this->getTeachers();
        $departments = $this->getDepartments($schools);
        $method = "POST";
        return view('lessons.input', ['lesson' => $lesson,'schools' => $schools, 'departments' => $departments, 'method' => $method, 'teachers' => $teachers]);
    }
    
    private function getTeachers() {
        return Teacher::select('teachers.id', 'teachers.name')
            ->join('schools', 'schools.id', '=', 'teachers.school_id')
            ->orderBy('schools.ord', 'ASC')
            ->orderBy('teachers.position', 'ASC')
            ->orderBy('teachers.id', 'ASC')
            ->get();
    }
    
    private function getDepartments($schools) {
        $departments = [];
        foreach($schools as $school){
            $tmp = [];
            foreach($school->departments as $department) {
                $tmp[$department->id] = $department->name;
            }
            $departments[$school->name] = $tmp;
            
        }
        return $departments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:191',
        //     'school_id' => 'nullable|unique:schools',
        //     'department_id' => 'nullable|unique:departments',
        //     'target_year' => 'required|between:2019,2100',
        //     'semester' => 'required|between:2019,2100',
        //     '' => '',
        // ]);
        // $v->sometimes('is_general', 'required', function ($input) {
        //     return $input->is_expert == 0 && $input->is_language ;
        // });
        // if ($validator->fails()) {
        //     return redirect('lesson/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        $lesson = new Lesson;
        $lesson = $this::saveLesson($lesson, $request);
        $this::saveLessonTesacher($lesson, $request);
        return redirect('lessons');
    }
    
    private function saveLesson(\App\Lesson $lesson, Request $request) {
        $lesson->name = $request->name;
        $lesson->school_id = $request->school_id;
        $lesson->department_id = $request->department_id;
        $lesson->target_year = $request->target_year;
        $lesson->semester = $request->semester;
        $lesson->lesson_type = $request->lesson_type;
        $lesson->opening_year = $request->opening_year;
        $lesson->unit = $request->unit;
        $lesson->day_of_the_week = $request->day_of_the_week;
        $lesson->period = $request->period;
        $lesson->outline = $request->outline;
        $lesson->goal = $request->goal;
        $lesson->book = $request->book;
        $lesson->test = $request->test;
        $lesson->save();
        return $lesson;
    }
    
    private function saveLessonTesacher(\App\Lesson $lesson, Request $request) {
        $teacher_ids = $request->teacher_id;
        $lesson->teachers()->sync($teacher_ids);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('lessons.detail', ['lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $teachers = $this->getTeachers();
        $schools = School::orderBy('ord', 'ASC')->get();
        $departments = $this->getDepartments($schools);
        $method = "PUT";
        return view('lessons.input', ['lesson' => $lesson,'schools' => $schools, 'departments' => $departments, 'method' => $method, 'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $lesson = $this::saveLesson($lesson, $request);
        $this::saveLessonTesacher($lesson, $request);
        return redirect('lessons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect('lessons');
    }
}
