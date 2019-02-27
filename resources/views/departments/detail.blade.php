@extends('layouts.master')

@section('title', '学部一覧')

@section('content')
<dl class="row  border-bottom mb-4">
  <dt class="col-sm-4">学部名</dt>
  <dd class="col-sm-8">{{$department->schoolName()}}</dd>
</dl>
<dl class="row  border-bottom mb-4">
  <dt class="col-sm-4">学科名</dt>
  <dd class="col-sm-8">{{$department->name}}</dd>
</dl>
<dl class="row  border-bottom mb-4">
  <dt class="col-sm-4">表示順</dt>
  <dd class="col-sm-8">{{$department->ord}}</dd>
</dl>
<div class="row">
  <div class="col-sm-2">
    <a href="{{route('departments.edit', ['department' => $department->id])}}" class="btn btn-primary">編集</a>
  </div>
  <div class="col-sm-2">
    <a href="{{route('departments.index')}}" class="btn btn-primary">一覧</a>
  </div>
</div>
@endsection