@extends('layouts.layout')

@section('content')

<div id="form-wrap">
    <div class="crate-wrap">
        <h3>カリキュラム生の追加</h3>
            <form method="post" action="/create">
            {{ csrf_field() }}
                <input type="text" name="student_name">
                <input type="submit">
            </form>
    </div><!-- create-wrap -->
    <div class="search-wrap">
        <h3>カリキュラム生の検索</h3>
            <form method="post" action="/">
            {{ csrf_field() }}
                <input type="text" name="search_name">
                <input type="submit">
            </form>
    </div><!-- search-wrap -->
</div><!-- form-wrap -->

<h1 id="index_title">カリキュラム生 一覧</h1>
<table id="index_table">
    <tr>
        <th>名前</th>
        <th>カリキュラム進捗</th>
        <th>状況</th>
        <th>担当営業が入る予定</th>
    <tr>
    @if (!empty($students))
        @foreach($students as $student)
        <tr data-href="/edit/{{ $student->student_id}}">
            <td>{{ $student->student_name }}</td>
            <td>{{ $student->progress }}</td>
            <td>{{ $student->retire }}</td>
            <td></td>
            </a>
        </tr>
        @endforeach
        {{ $students->links() }}
    @elseif (!empty($searchName))
        @foreach($searchName as $student)
        <tr data-href="/edit/{{ $student->student_id}}">
            <td>{{ $student->student_name }}</td>
            <td>{{ $student->progress }}</td>
            <td>{{ $student->retire }}</td>
            <td></td>
            </a>
        </tr>
        @endforeach
    @endif
</table>



@endsection