@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="content">
  <div class="content-ttl">
    <h2>Confirm</h2>
  </div>

  <form action="/send" method="post" class="content-form">
    @csrf

    <table class="table">
      <tr class="table__row">
        <th class="table__header">お名前</th>
        <td class="table__item">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
      </tr>
      <tr class="table__row">
        <th class="table__header">性別</th>
        <td class="table__item">{{ $contact['gender'] }}</td>
      </tr>
      <tr class="table__row">
        <th class="table__header">メールアドレス</th>
        <td class="table__item">{{ $contact['email'] }}</td>
      </tr>
      <tr class="table__row">
        <th class="table__header">電話番号</th>
        <td class="table__item">{{ $contact['tel1'] }}-{{ $contact['tel2'] }}-{{ $contact['tel3'] }}</td>
      </tr>
      <tr class="table__row">
        <th class="table__header">住所</th>
        <td class="table__item">{{ $contact['address'] }}</td>
      </tr>
      <tr class="table__row">
        <th class="table__header">建物名</th>
        <td class="table__item">{{ $contact['building'] }}</td>
      </tr>
      <tr class="table__row">
        <th class="table__header">お問い合わせの種類</th>
        <td class="table__item">{{ $categories[$contact['category_id']] }}</td>
      </tr>
      <tr class="table__row">
        <th class="table__header">お問い合わせの内容</th>
        <td class="table__item">{{ $contact['message'] }}</td>
      </tr>
    </table>

    {{-- hidden inputs --}}
    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
    <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
    <input type="hidden" name="email" value="{{ $contact['email'] }}">
    <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
    <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
    <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
    <input type="hidden" name="address" value="{{ $contact['address'] }}">
    <input type="hidden" name="building" value="{{ $contact['building'] }}">
    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
    <input type="hidden" name="message" value="{{ $contact['message'] }}">

    <div class="form-button">
      <button class="form-button-submit" type="submit">送信</button>
      <button type="submit" name="action" value="back">修正する</button>
    </div>
  </form>
</div>
@endsection
