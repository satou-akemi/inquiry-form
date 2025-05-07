<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<header class="header">
  <div class="header-container">
    <div class="header__inner">
        <a href="/" class="header__logo">FashionablyLate</a>
    </div>
    <div class="login-logo">
      <a href="/login">register</a>
    </div>
   </div>
</header>
<main>
<!--ロゴ-->
  <p class="title-logo">Login</p>
<!--認証-->
<form action="/admin" method="post">
    @csrf
  <div class="form-content">
    <div class="form__item">
    <label class="label__login" form ="email">メールアドレス<br />
      <input class="form__item-login" type="text" name="email" value="{{ old('email')}}" placeholder="例:text@example.com" >
    </label>
    @error('email')
     <p class="error">{{$message}}</p>
     @enderror
     </div>

     <div class="form__item">
    <label class="label__login" form="password">パスワード<br />
      <input class="form__item-login" type="password" name="password" value="{{ old('password')}}" placeholder="例:coachtech1106"></label>
    @error('password')
      <p class="error">{{ $message }}
      </p>
    @enderror
    </div>

<!--ログインボタン-->
    <div class="login__button">
        <button class="login__button-submit" type="submit">ログイン</button>
    </div>
    </form>
</div>
</body>
</html>