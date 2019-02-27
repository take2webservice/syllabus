@extends('layouts.master')


<?php
$title = "学部新規作成";
$url = route('schools.store');
if($method == "PUT") {
  $url = route('schools.update',  ['school' => $school->id]);
  $title = "学部編集";
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
      <label for="name">学部名</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="学部名" value="{{ $school->name }}">
    </div>
    <div class="form-group">
      <label for="name">表示順</label>
      <input type="number" class="form-control" id="ord" name="ord" placeholder="1" value="{{ $school->ord }}">
    </div>
    <button type="submit" class="btn btn-primary">保存</button>      
</form>
<div class="row">
  @if($method == "PUT")
  <form method="POST" class="col-sm-2" action="{{route('schools.destroy', ['school' => $school->id])}}">
    {{ method_field('DELETE') }}
    {{csrf_field()}}
    <button  class="btn btn-danger">削除</button>
  </form>
  @endif
  <div class="col-sm-2">
    <a href="{{route('schools.index')}}" class="btn btn-primary">一覧</a>
  </div>
</div>

@endsection