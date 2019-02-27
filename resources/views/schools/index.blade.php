@extends('layouts.master')

@section('title', '学部一覧')

@section('content')
<form action="{{route('schools.index')}}">
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
          <a href="{{route('schools.create')}}" class="btn btn-primary">新規</a>      
        </div>        
      </div>
    </div>
</form>

<table class="table p-3">
  <thead>
    <tr>
      <th scope="col">学部名</th>
      <th scope="col">表示順</th>
      <th scope="cpl" colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($schools as $school)
    <tr>
      <td><a class="text-secondary" href="{{route('schools.show', ['id' => $school->id])}}">{{$school->name}}</a></td>
      <td><a class="text-secondary" href="{{route('schools.show', ['id' => $school->id])}}">{{$school->ord}}</a></td>
      <td>
        <ul>
          @foreach($school->departments as $department)
          <li>
            <a class="text-secondary" href="{{route('departments.show', ['id' => $department->id])}}">{{$department->name}}</a>
          </li>
          @endforeach
        </ul>
      </td>
      <td><a class="text-secondary" href="{{route('departments.create', ['school_id' => $school->id])}}">学科を作る</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $schools->links() }}

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