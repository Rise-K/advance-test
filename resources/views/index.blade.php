@php
$title = "お問い合わせ"
@endphp

@extends('layout')

@section('content')
<div class="container">
  <div class="detail">
  <h1 class="title">お問い合わせ</h1>

  @if ($errors->any())
  <div style="color:red;">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
  </div>
  @endif

    <form action="/content" method="post">
    @csrf
      <table class="form">
        <tr class="name">
          <th>お名前<span>※</span></th>
          <td>
            <input type="name" class="fullname" value="{{ old('fullname') }}" />
          </td>
        </tr>
        <tr class="ex_name">
          <th>　　　　</th>
          <td>　例)山田　太郎</td>
        </tr>
        {{-- <tr class="gender">
          <th>性別<span>※</span></th>
          <td>
            <label class="radiobutton">
              <input type="radio" name="gender" value="1" @if(old("gender") == 1) checked @endif />男性</label>
            <label class="radiobutton"><input type="radio" name="gender" value="2" />女性</label>
          </td>
        </tr> --}}
        <tr class="email">
          <th>メールアドレス<span>※</span></th>
          <td>
            <input type="email" name ="email" class="mail" value="{{ old('email') }}" />
          </td>
        </tr>
        <tr class="ex_email">
          <th>　　　　　</th>
          <td>　例) test@example.com</td>
        </tr>
        <tr class="postcode">
          <th>郵便番号<span>※</span></th>
          <td>
            <label>〒<input type="text" name="postcode" class="post" value="{{ old('postcode') }}" /></label>
          </td>
        </tr>
        <tr class="ex_postcode">
          <th>　　　　　</th>
          <td>　　　例) 123-4567</td>
        </tr>
        <tr class="address">
          <th>住所<span>※</span></th>
          <td>
            <input type="text" name="address" class="ad" value="{{ old('address') }}" />
          </td>
        </tr>
        <tr class="ex_address">
          <th>　　　　　</th>
          <td>　例) 東京都渋谷区千駄ヶ谷1-2-3</td>
        </tr>
        <tr class="building">
          <th>建物名</th>
          <td>
            <input type="text" name="building_name" class="build" value="{{ old('building_name') }}" />
          </td>
        </tr>
        <tr class="ex_building">
          <th>　　　　　</th>
          <td>　例) 千駄ヶ谷マンション101</td>
        </tr>
        <tr class="contact">
          <th>ご意見<span>※</span></th>
          <td>
            <textarea name="opinion" class="text"> {{ old('opinion') }}</textarea>
          </td>
        </tr>
      </table>
      <button class="btn" type="submit">確認</button>
    </form>
  </div>
</div>
@endsection