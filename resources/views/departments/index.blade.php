@extends('layouts.master')

@section('title', '学科一覧')

@section('content')

<form action="{{route('departments.index')}}">
    <div class="form-group">
      <div class="row">
        <div class="col-sm-2">
          <label for="freeword">フリーワード</label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="freeword" name="freeword" placeholder="フリーワード" value="{{$freeword}}">
        </div>
        <div class="col-sm-1">
          <button type="submit" class="btn btn-primary">検索</button>      
        </div>
        <div class="col-sm-1">
          <a href="{{route('departments.create')}}" class="btn btn-primary">新規</a>      
        </div>        
      </div>
    </div>
</form>

<table class="table p-3">
  <thead>
    <tr>
      <th scope="col">学部名</th>
      <th scope="col">学科名</th>
      <th scope="col">表示順</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($departments as $department)
    <tr>
      <td><a class="text-secondary" href="{{route('departments.show', ['id' => $department->id])}}">{{$department->schoolName()}}</a></td>
      <td><a class="text-secondary" href="{{route('departments.show', ['id' => $department->id])}}">{{$department->name}}</a></td>
      <td><a class="text-secondary" href="{{route('departments.show', ['id' => $department->id])}}">{{$department->ord}}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>


<nav class="p-3">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
@endsection