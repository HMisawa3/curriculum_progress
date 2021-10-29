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
        <th>カリキュラム進捗<a href="/sort">&nbsp;&nbsp;s</a></th>
        <th>在籍</th>
        <!-- <th>担当営業が入る予定</th> -->
        <th>最終来社日</th>
        <th>最終質問日(ChatLuck)</th>
    <tr>
    @if (!empty($students))
        @foreach($students as $student)
        <tr data-href="/edit/{{ $student->student_id}}">
            <td>{{ $student->student_name }}</td>
            <td>{{ $student->progress }}</td>
            <td>{{ $student->retire }}</td>
            <!-- <td></td> -->
            @if($student->last_visit_date == NULL)
            <td>まだオフィス来社はありません</td>
            @else
            <td>{{ $student->last_visit_date }}</td>
            @endif
            <td>{{ $student->last_question_date }}</td>
        </tr>
        @endforeach
        {{ $students->links() }}
    @endif
</table>



@endsection