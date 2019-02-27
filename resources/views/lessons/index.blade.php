@extends('layouts.master')

@section('title', 'シラバス検索結果')

@section('content')

<table class="table p-3">
  <thead>
    <tr>
      <th scope="col">学部／研究科</th>
      <th scope="col">科目名</th>
      <th scope="col">区分</th>
      <th scope="col">教員名</th>
      <th scope="col">期</th>
      <th scope="col">曜日・時限</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lessons as $lesson)
    <tr>
      <td><a class="text-secondary" href="{{route('lessons.show',  ['lesson' => $lesson->lesson_code])}}">{{$lesson->school->name}}</a></td>
      <td><a class="text-secondary" href="{{route('lessons.show',  ['lesson' => $lesson->lesson_code])}}">{{$lesson->name}}</a></td>
      <td><a class="text-secondary" href="{{route('lessons.show',  ['lesson' => $lesson->lesson_code])}}">{{$lesson->getLessonType()}}</a></td>
      <td><a class="text-secondary" href="{{route('lessons.show',  ['lesson' => $lesson->lesson_code])}}">{{$lesson->teachers}}</a></td>
      <td><a class="text-secondary" href="{{route('lessons.show',  ['lesson' => $lesson->lesson_code])}}">{{$lesson->getSemster()}}</a></td>
      <td><a class="text-secondary" href="{{route('lessons.show',  ['lesson' => $lesson->lesson_code])}}">{{$lesson->getLessonSchedule()}}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>


<nav class="p-3">
  {{ $lessons->links() }}
</nav>
@endsection