@extends('layouts.master')


<?php
$title = "講義新規作成";
$url = route('lessons.store');
if($method == "PUT") {
  $url = route('lessons.update',  ['lesson' => $lesson->id]);
  $title = "講義編集";
}
?>

@section('title', $title)

@section('content')
<form action="{{$url}}" method="POST" class="mb-3">
    {{csrf_field()}}
    @if($method == "PUT")
      {{ method_field('PUT') }}
    @else
      {{ method_field('POST') }}
    @endif

    <div class="form-group">
      <label for="school">学部名</label>
      {{Form::select('school_id', array_pluck($schools, 'name', 'id'), $lesson->school_id, ['class' => 'form-control'])}}
    </div>
    
    <div class="form-group">
      <label for="school">学科名</label>
      {{Form::select('department_id', $departments, $lesson->department_id, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
      <label for="name">講義名</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="講義名" value="{{ $lesson->name }}">
    </div>

    <div class="form-group">
      <label for="name">担当</label>
      <div class="row" style="margin: 0;">
        {{Form::select(null, array_pluck($teachers, 'name', 'id'), null,['class' => 'form-control col-sm-10', 'id' => 'teacher_select'])}}
        <button type='button' class="btn btn-primary col-sm-2" id="add_teacher_btn">追加</button>
      </div>
    </div>

    <ul id='selected_teachers' class="list-group">
      @if (count($lesson->teachers) > 0)
      @foreach($lesson->teachers as $teacher)
      <li class='list-group-item' style='padding: 1em;'>
        <div class="row">
          <div class='col-sm-3' style='line-height: 36px;'>{{$teacher->name}}</div>
          <button type='button' class="btn btn-danger col-sm-2 remove_teacher_btn">削除</button>
          <input type="hidden" value='{{$teacher->id}}' name="teacher_id[]" class="teacher_id">
        </div>
      </li>
      @endforeach
      @endif
    </ul>

    <div class="form-group">
      <label for="name">対象年度</label>
      <input type="number" class="form-control" id="target_year" name="target_year" placeholder="{{date("Y")}}" value="{{ $lesson->target_year }}">
    </div>

    <div class="form-group">
      <label for="name">前期・後期</label>
      {{Form::select('semester', App\Lesson::SEMESTERS, $lesson->semester, ['class' => 'form-control'])}}
    </div>
    
    <div class="form-group">
      <label>講義タイプ</label>
      <div>
        @foreach(App\Lesson::LESSON_TYPES as $type)
          {{Form::label($type['id'], $type['label'] )}}
          {{Form::radio('lesson_type', $type['value'], $lesson->lesson_type === $type['value'], array('name' => 'lesson_type', 'id' => $type['id']))}}
        @endforeach
      </div>
    </div>
   
    <div class="form-group">
      <label for="name">単位数</label>
      <input type="number" class="form-control" id="unit" name="unit" placeholder="2" value="{{ $lesson->unit }}">
    </div>

    <div class="form-group">
      <label for="name">開講年次</label>
      <input type="number" class="form-control" id="opening_year" name="opening_year" placeholder="1" value="{{ $lesson->opening_year }}">
    </div>

    <div class="form-group">
      <label for="name">開講曜日</label>
      {{Form::select('day_of_the_week', App\Lesson::DAY_OF_WEEKS, $lesson->day_of_the_week, ['class' => 'form-control'])}}
    </div>
    
    <div class="form-group">
      <label for="name">時限</label>
      {{Form::select('period', App\Lesson::PERIODS, $lesson->period, ['class' => 'form-control'])}}
    </div>
    
    <div class="form-group">
      <label for="comment">概要</label>
      <textarea class="form-control" rows="5" id="outline" name="outline">{{ $lesson->outline }}</textarea>
    </div>
    <div class="form-group">
      <label for="comment">講義のゴール</label>
      <textarea class="form-control" rows="5" id="goal" name="goal">{{ $lesson->goal }}</textarea>
    </div>
    <div class="form-group">
      <label for="comment">教科書・参考書籍</label>
      <textarea class="form-control" rows="5" id="book" name="book">{{ $lesson->book }}</textarea>
    </div>
    <div class="form-group">
      <label for="comment">試験・評価方法</label>
      <textarea class="form-control" rows="5" id="test" name="test">{{ $lesson->test }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">保存</button>      
</form>
<div class="row">
  @if($method == "PUT")
  <form method="POST" class="col-sm-2" action="{{route('lessons.destroy', ['lesson' => $lesson->id])}}">
    {{ method_field('DELETE') }}
    {{csrf_field()}}
    <button  class="btn btn-danger">削除</button>
  </form>
  @endif
  <div class="col-sm-2">
    <a href="{{route('lessons.index')}}" class="btn btn-primary">一覧</a>
  </div>
</div>

@endsection