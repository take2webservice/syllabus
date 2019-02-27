<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $freeword = $request->freeword;
        $schools;
        if (empty($freeword)) {
            $schools = School::orderBy('ord', 'asc')->simplePaginate(10);    
        } else {
            $schools = School::where('name', 'LIKE', "%$freeword%")->orderBy('ord', 'asc')->simplePaginate(10);
        }
        return view('schools.index', ['schools' => $schools, 'freeword' => $freeword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = new School;
        $method = "POST";
        return view('schools.input', ['school' => $school, 'method' => $method]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new School;
        $school->name = $request->name;
        $school->ord = $request->ord;
        $school->save();
        return redirect('schools');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::find($id);
        return view('schools.detail', ['school' => $school]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::find($id);
        $method = "PUT";
        return view('schools.input', ['school' => $school, 'method' => $method]);
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
        $school = School::find($id);
        $school->name = $request->name;
        $school->ord = $request->ord;
        $school->save();
        return redirect(route('schools.show', ['id'=>$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::find($id);
        $school->delete();
        return redirect('schools');
    }
}
