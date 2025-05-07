<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__logo">FashionablyLate</a>
        </div>
    </header>
<main>
<div class="admin__content">
  <div class="admin__content--ttl">
    <a href="/admin" class="admin__content--logo">admin</a>
  </div>
<div class="form-search">
  <form action="/index" method="get">
<!--検索 -->
    <div class="form__item-search">
    <input type="search" name="search" value="{{ request('search')}}" placeholder="名前やメールアドレスを入力してください">
    </div>

<!--性別選択-->
    <div class="form__item-search">
    <select name="gender" >
        <option value="">性別</option>
        <option value="1"{{ request('gender') == '1' ? 'selected' : '' }} >男性</option>
        <option value="2"{{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
        <option value="3"{{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
    </select>
    </div>

<!--問い合わせの種類-->
    <select class="search-form__item" name="category_id">
  <option value="">お問い合わせの種類</option>
  @foreach ($categories as $category)
    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
  {{ $category->content }}
</option>

  @endforeach
</select>
<!--日付-->
     <div class="form-date">
      <input type="date" name="from_date" value="{{ request('from_date') }}">

     </div>
<!--検索ボタン-->
     <div class="form-search__button">
       <button class="search__button-submit" type="submit">検索</button>
     </div>
<!--リセット-->
     <div class="form-reset__button">
      <a href="/admin" class="reset-button">リセット</a>
     </div>
     </form>
   <div class="form-result">
    <div class="form-result-export">
      <form action="/admin.export" method="get">
<!--エクスポート-->
       <div class="export__button">
       <button class="export__button-submit" type="submit">エクスポート</button>
       </div>
      </form>

<!--一覧-->
     <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>お問い合わせの種類</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($contacts as $contact)
      <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->last_name }}{{ $contact->first_name }}</td>
        <td>{{ $contact->gender }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->category->content ?? '未設定' }}</td>
        <td> 
        <button type="button" class="btn btn-sm btn-info showInquiryModal" data-inquiry='@json($contact)'>詳細</button>
        </td>
        </tr>
        @endforeach
  </tbody>
</table>
<!--ページネーション-->
<div class="pagination-wrapper">
  {{ $contacts->links() }}
</div>
    </div>
   </div>
</div>
</div>
</main>
<!--モーダル本体-->
<div class="modal fade" id="inquiryModal" tabindex="-1" role="dialog" aria-labelledby="inquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inquiryModalLabel">お問い合わせ詳細</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <dl class="row">
          <dt class="col-md-3">お名前</dt>       <dd class="col-md-9" id="modal-name"></dd>
          <dt class="col-md-3">性別</dt>         <dd class="col-md-9" id="modal-gender"></dd>
          <dt class="col-md-3">メールアドレス</dt>       <dd class="col-md-9" id="modal-email"></dd>
          <dt class="col-md-3">電話番号</dt>     <dd class="col-md-9" id="modal-phone"></dd>
          <dt class="col-md-3">住所</dt>         <dd class="col-md-9" id="modal-address"></dd>
          <dt class="col-md-3">建物名</dt>       <dd class="col-md-9" id="modal-building"></dd>
          <dt class="col-md-3">お問い合わせの種類</dt>     <dd class="col-md-9" id="modal-type"></dd>
          <dt class="col-md-3">お問い合わせの内容</dt>         <dd class="col-md-9" id="modal-content"></dd>
        </dl>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="delete-button">削除</button>
      </div>
    </div>
  </div>
</div>
<!-- jQuery & Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!--モーダルjava-->
<script>
  $(function(){
    $('.showInquiryModal').on('click', function () {
      const inquiry = $(this).data('inquiry');
      $('#modal-name').text((inquiry.last_name ?? '') + (inquiry.first_name ?? ''));
      const genderText = {
      1: '男性',
      2: '女性',
      3: 'その他'
      }[inquiry.gender] ?? '';
      $('#modal-gender').text(inquiry.gender ?? '');
      $('#modal-email').text(inquiry.email ?? '');
      $('#modal-phone').text(inquiry.phone ?? '');
      $('#modal-address').text(inquiry.address ?? '');
      $('#modal-building').text(inquiry.building ?? '');
      $('#modal-type').text(inquiry.category?.content ?? inquiry.type ?? '');
      $('#modal-content').text(inquiry.content ?? '');

      $('#inquiryModal').modal('show');
    });
  });
</script>

</body>
</html>
