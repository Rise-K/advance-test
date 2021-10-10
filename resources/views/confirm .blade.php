@php
$title = "内容確認"
@endphp

@extends('layout')

@section('content')
  <h1>内容確認</h1>
  <form action="/content/send" method="post">
  @csrf
    <table>
      <tr>
        <th>お名前<span>※</span></th>
        <td>{{$input['fullname']}}</td>
      </tr>
      {{-- <tr>
        <th>性別<span>※</span></th>
        <td>{{$input['gender']}}</td>
      </tr> --}}
      <tr>
        <th>メールアドレス<span>※</span></th>
        <td>{{$input['email']}}</td>
      </tr>
      <tr>
        <th>郵便番号<span>※</span></th>
        <td>{{$input['postcode']}}</td>
      </tr>
      <tr>
        <th>住所<span>※</span></th>
        <td>{{$input['address']}}</td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>{{$input['building_name']}}</td>
      </tr>
      <tr>
        <th>ご意見<span>※</span></th>
        <td>{{$input['opinion']}}</td>
      </tr>
    </table>
    <input type="submit" value="送信" />
    <input name="back" type="submit" value="戻る" />
  </form>
@endsection