@extends('layouts.master')

@section('title', '学部一覧')

@section('content')
<dl class="row  border-bottom mb-4">
  <dt class="col-sm-4">学部名</dt>
  <dd class="col-sm-8">{{$school->name}}</dd>
</dl>
<dl class="row  border-bottom mb-4">
  <dt class="col-sm-4">表示順</dt>
  <dd class="col-sm-8">{{$school->ord}}</dd>
</dl>
<dl class="row  border-bottom mb-4">
  <dt class="col-sm-4">学科</dt>
  <dd class="col-sm-8">
    @if (count($school->departments) > 0)
      @foreach($school->departments as $department)
        <a href="route('$departments.show',['id => department->id])">{{$department->name}}</a>&nbsp;
      @endforeach
    @else
      未設定
    @endif
  </dd>
</dl>
<div class="row">
  <div class="col-sm-2">
    <a href="{{route('schools.edit', ['school' => $school->id])}}" class="btn btn-primary">編集</a>
  </div>
  <div class="col-sm-2">
    <a href="{{route('schools.index')}}" class="btn btn-primary">一覧</a>
  </div>
</div>
@endsection