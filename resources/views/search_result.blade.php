@extends('layouts.master')

@section('title', 'シラバス検索結果')

@section('content')

<table class="table p-3">
  <thead>
    <tr>
      <th scope="col">コード</th>
      <th scope="col">学部／研究科</th>
      <th scope="col">科目名</th>
      <th scope="col">区分</th>
      <th scope="col">教員名</th>
      <th scope="col">開講年次</th>
      <th scope="col">期</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a class="text-secondary" href="/detail">1</a></td>
      <td><a class="text-secondary" href="#">人文学部 文化学科</a></td>
      <td><a class="text-secondary" href="#">アジア宗教文化論Ⅰ	</a></td>
      <td><a class="text-secondary" href="#">専門</a></td>
      <td><a class="text-secondary" href="#">岸根　敏幸</a></td>
      <td><a class="text-secondary" href="#">2</a></td>
      <td><a class="text-secondary" href="#">後期</a></td>
    </tr>
    <tr>
      <td><a class="text-secondary" href="#">2</a></td>
      <td><a class="text-secondary" href="#">人文学部 文化学科</a></td>
      <td><a class="text-secondary" href="#">アジア宗教文化論Ⅰ	</a></td>
      <td><a class="text-secondary" href="#">専門</a></td>
      <td><a class="text-secondary" href="#">岸根　敏幸</a></td>
      <td><a class="text-secondary" href="#">2</a></td>
      <td><a class="text-secondary" href="#">後期</a></td>
    </tr>
    <tr>
      <td><a class="text-secondary" href="#">3</a></td>
      <td><a class="text-secondary" href="#">人文学部 文化学科</a></td>
      <td><a class="text-secondary" href="#">アジア宗教文化論Ⅰ	</a></td>
      <td><a class="text-secondary" href="#">専門</a></td>
      <td><a class="text-secondary" href="#">岸根　敏幸</a></td>
      <td><a class="text-secondary" href="#">2</a></td>
      <td><a class="text-secondary" href="#">後期</a></td>
    </tr>
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