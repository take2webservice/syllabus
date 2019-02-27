@extends('layouts.master')

@section('title', 'アジア宗教文化論Ⅰ')

@section('content')
<section class="border-bottom mb-4">
  <h2>概要</h2>
  <div class="container">
    <div class="row border-bottom mb-4">
      <div class="col-sm-4">
        <dl class="row">
          <dt class="col-sm-4">コード</dt>
          <dd class="col-sm-8">{{$lesson->lesson_code}}</dd>
        </dl>
      </div>
      <div class="col-sm-4">
        <dl class="row">
          <dt class="col-sm-4">科目名</dt>
          <dd class="col-sm-8">{{$lesson->name}}</dd>
        </dl>
      </div>
      <div class="col-sm-4">
        <dl class="row">
          <dt class="col-sm-6">担当教員</dt>
          <dd class="col-sm-6">{{$lesson->teachers}}</dd>
        </dl>
      </div>
    </div>
    <div class="row border-bottom mb-4">
      <div class="col-sm-4">
        <dl class="row">
          <dt class="col-sm-6">期別</dt>
          <dd class="col-sm-6">{{$lesson->getSemster()}}</dd>
        </dl>
      </div>
      <div class="col-sm-4">
        <dl class="row">
          <dt class="col-sm-6">開講年次</dt>
          <dd class="col-sm-6">{{$lesson->target_year}}</dd>
        </dl>
      </div>
      <div class="col-sm-4">
        <dl class="row">
          <dt class="col-sm-6">単位</dt>
          <dd class="col-sm-6">{{$lesson->unit}}</dd>
        </dl>
      </div>
    </div>
  </div>
  <p>
    {!! nl2br(e($lesson->outline)) !!}
  </p>
</section>
<section class="border-bottom mb-4">
  <h2>到達目標</h2>
  <p>
    {!! nl2br(e($lesson->goal)) !!}
  </p>
</section>
<section class="border-bottom mb-4">
  <h2>テキスト</h2>
  <p>
    {!! nl2br(e($lesson->book)) !!}
  </p>
</section>
<section class="border-bottom mb-4">
  <h2>成績評価基準・方法</h2>
  <p>
    {!! nl2br(e($lesson->test)) !!}
  </p>
</section>

<div class="row">
  <div class="col-sm-2">
    <a href="{{route('lessons.edit', ['school' => $lesson->id])}}" class="btn btn-primary">編集</a>
  </div>
  <div class="col-sm-2">
    <a href="{{route('lessons.index')}}" class="btn btn-primary">一覧</a>
  </div>
</div>
@endsection