<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>管理システム</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  </head>


  <body>
    <div class="container">
      <h1 class="title">管理システム</h1>
      <div class="system">
        <form action="/content/admin" method="post">
        @csrf
        {{method_field('get')}}
          <table>
            <tr>
              <th>お名前</th>
              <td class="name_gender">
                <input type="text">
              </td>
              <th>性別</th>
              <td>
                <label class="radiobutton"><input type="radio" name="gender" value="0" checked />全て</label>
                <label class="radiobutton"><input type="radio" name="gender" value="1" />男性</label>
                <label class="radiobutton"><input type="radio" name="gender" value="2" />女性</label>
              </td>
            </tr>
            <tr>
              <th>登録日</th>
              <td class="date">
                <input type="text"> ~<input type="text">
              </td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td><input type="text"></td>
            </tr>
          </table>
        <button type="submit" class="searchbtn">検索</button>
        </form>
        <a href="{{url('/content/admin')}}">リセット</a>
      </div>

      <div class="db">
        <table>
          <tr class="detail">
            <th class="id">ID</th>
            <th class="name">お名前</th>
            <th class="gender">性別</th>
            <th class="email">メールアドレス</th>
            <th class="opinion">ご意見</th>
          </tr>

          {{$contents->
          links('pagination::mypagination')}}
          @foreach ($contents as $content)
          <tr>
            <td class="id">{{$content->id}}</td>
            <td class="name">{{$content->fullname}}</td>
            <td class="gender">{{$content->gender}}</td>
            <td class="email">{{$content->email}}</td>
            <td class="opinion">{{Str::limit($content->opinion,50)}}</td>
            <td>
              <form action="/content/delete/{{$content->id}}" method="post">
              @csrf
                <button type="submit" class="delete-btn">削除</button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>