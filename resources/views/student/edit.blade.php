@extends('layouts.layout')

@section('content')
<h1 id="index_title">カリキュラム生 ステータス変更</h1>

<form class="form_wrap" method="post" action="/edit/{{ $studentInfo['student_id'] }}">
{{ csrf_field() }}
  <table id="edit_table">
    <tr>
      <th>名前</th>
        <td class="student_name">{{ $studentInfo->student_name }}</td>
    </tr>
    <tr>
      <th>~進捗~</th>
        <td>
@if(!empty($studentInfo->progress))
    <select name="progress">
        <option value="F-L1" @if($studentInfo->progress=="F-L1") selected @endif> F-L1</option>
        <option value="F-L2" @if($studentInfo->progress=="F-L2") selected @endif> F-L2</option>
        <option value="F-L3-1" @if($studentInfo->progress=="F-L3-1") selected @endif> F-L3-1</option>
        <option value="F-L3-2" @if($studentInfo->progress=="F-L3-2") selected @endif> F-L3-2</option>
        <option value="F-L3-3" @if($studentInfo->progress=="F-L3-3") selected @endif>F-L3-3</option>
        <option value="F-L4-1" @if($studentInfo->progress=="F-L4-1") selected @endif>F-L4-1</option>
        <option value="F-L4-2" @if($studentInfo->progress=="F-L4-2") selected @endif>F-L4-2</option>
        <option value="F-L4-3" @if($studentInfo->progress=="F-L4-3") selected @endif>F-L4-3</option>
        <option value="F-L4-4" @if($studentInfo->progress=="F-L4-4") selected @endif>F-L4-4</option>
        <option value="S-L1" @if($studentInfo->progress=="S-L1") selected @endif>S-L1</option>
        <option value="S-L2" @if($studentInfo->progress=="S-L2") selected @endif>S-L2</option>
        <option value="S-L3" @if($studentInfo->progress=="S-L3") selected @endif>S-L3</option>
        <option value="S-L4" @if($studentInfo->progress=="S-L4") selected @endif>S-L4</option>
        <option value="S-L5" @if($studentInfo->progress=="S-L5") selected @endif>S-L5</option>
        <option value="S-L6" @if($studentInfo->progress=="S-L6") selected @endif>S-L6</option>
        <option value="S-L7" @if($studentInfo->progress=="S-L7") selected @endif>S-L7</option>
        <option value="DawnSNS" @if($studentInfo->progress=="DawnSNS") selected @endif> DawnSNS</option>
    </select><br>
@else
    <select name="progress">
        <option value="F-L1">F-L1</option>
        <option value="F-L2">F-L2</option>
        <option value="F-L3-1">F-L3-1</option>
        <option value="F-L3-2">F-L3-2</option>
        <option value="F-L3-3">F-L3-3</option>
        <option value="F-L4-1">F-L4-1</option>
        <option value="F-L4-2">F-L4-2</option>
        <option value="F-L4-3">F-L4-3</option>
        <option value="F-L4-4">F-L4-4</option>
        <option value="S-L1">S-L1</option>
        <option value="S-L2">S-L2</option>
        <option value="S-L3">S-L3</option>
        <option value="S-L4">S-L4</option>
        <option value="S-L5">S-L5</option>
        <option value="S-L6">S-L6</option>
        <option value="S-L7">S-L7</option>
        <option value="DawnSNS">DawnSNS</option>
    </select><br>
@endif
        </td>
    </tr>
    <tr>
      <th>前回の質問</th>
        <td><textarea name="last_question" rows="4" cols="40">{{ $studentInfo['last_question'] }}</textarea></td>
    </tr>
    <tr>
      <th>理解度</th>
        <td><textarea name="comprehension" rows="4" cols="40">{{ $studentInfo['comprehension'] }}</textarea></td>
    </tr>
    <tr>
      <th>在籍ステータス</th>
        <td>
          <select name="retire">
            <option value="在籍(CD社員)">在籍(CD社員)</option>
            <option value="在籍(DB社員)">在籍(DB社員)</option>
            <option value="退職済み">退職済み</option>
          </select>
        </td>
    </tr>
    <tr>
      <th>最終来社日</th>
        <td><input type="date" name="last_visit_date" value="{{ $studentInfo['last_visit_date'] }}" rows="4" cols="40"></td>
    </tr>
    <tr>
      <th>最終質問日(chatluck)</th>
        <td><input type="date" name="last_question_date" value="{{ $studentInfo['last_question_date'] }}" rows="4" cols="40"></td>
    </tr>
    <tr>
      <td class="edit_btn" colspan="2">
        <input type="reset" value="リセット">
        <input type="submit" value="送信">
      </td>
    </tr>
  </table>
</form>

@endsection