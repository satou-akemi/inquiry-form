<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<header class="header">
  <div class="header-container">
        <a href="/" class="header__logo">FashionablyLate</a>
    <div class="login-logo">
      <a href="/login">login</a>
    </div>
    </div>
</header>
<main>
<!--ロゴ-->
  <p class="title-logo">Register</p>
<!--認証-->
<form class="register__form" action="/register" method="post">
@csrf
<div class="form-content">
<!--name-->
    <div class="form__item">
        <label for="name">お名前<br />
        <input class="form__item-register" type="text" name="name" value="{{ old('name')}}" placeholder="例：山田 太郎"></label>
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
<!--email-->
    <div class="form__item">
        <label for="email">メールアドレス<br />
        <input class="form__item-register" type="text" name="email" value="{{ old('email')}}" placeholder="例：text@example.com"></label>
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
<!--password-->
    <div class="form__item">
        <label for="password">パスワード<br />
        <input class="form__item-register" type="password" name="password" value="{{ old('password')}}" placeholder="例：coachtech1106"></label>
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
<!--button-->
   <div class="register-button">
     <button class="register-button-submit" type="submit">登録</button>
   </div>
   </div>
    </div>
   </div>
</form>