@extends('layouts.master')

@section('title', 'シラバス検索')

@section('content')
<form action="/lessons">
  <div class="form-group">
    <label for="freeword">フリーワード</label>
    <input type="text" class="form-control" id="freeword" placeholder="フリーワード">
  </div>
  <div class="form-group">
    <label for="school_id">学部・学科</label>
    {{Form::select('school_id', array_pluck($schools, 'name', 'id'), null, ['class' => 'form-control'])}}
  </div>
  <button type="submit" class="btn btn-primary">検索</button>
</form>
@endsection