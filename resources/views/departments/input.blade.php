@extends('layouts.master')

<?php
$title = "学科新規作成";
$url = route('departments.store');
if($method == "PUT") {
  $url = route('departments.update',  ['department' => $department->id]);
  $title = "学科編集";
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
      {{Form::select('school_id', array_pluck($schools, 'name', 'id'), $department->school_id, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      <label for="name">学科名</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="学科" value="{{ $department->name }}">
    </div>
    <div class="form-group">
      <label for="name">表示順</label>
      <input type="number" class="form-control" id="ord" name="ord" placeholder="1" value="{{ $department->ord }}">
    </div>
    <button type="submit" class="btn btn-primary">保存</button>      
</form>
<div class="row">
  <form method="POST" class="col-sm-2" action="{{route('departments.destroy', ['$department' => $department->id])}}">
    {{ method_field('DELETE') }}
    {{csrf_field()}}
    <button  class="btn btn-danger">削除</button>
  </form>  
  <div class="col-sm-2">
    <a href="{{route('departments.index')}}" class="btn btn-primary">一覧</a>
  </div>
</div>
@endsection