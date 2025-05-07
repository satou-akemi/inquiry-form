  @extends('layouts.app')
  @section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css')}}">
  @endsection

  @section('content')
  <div class="content">
  <div class="contact-ttl">
   <h2>Contact</h2></div>
<!--入力欄-->
    <div class="contact-content">
     <form action="/confirm" method="post">
      @csrf
    <div class="form-group">
<!--name-->
      <label class="form-label">お名前<span>※</span></label>
      <div class="form-group-input">
       <input type="text" name="last_name" value="{{ old('last_name', $input['last_name'] ?? '') }}"  placeholder="例：山田">
       @error('last_name')
            <p class="error">{{ $message }}</p>
        @enderror
       <input type="text" name="first_name" value="{{ old('first_name', $input['first_name'] ?? '') }}" placeholder="例：太郎">
       @error('first_name')
            <p class="error">{{ $message }}</p>
        @enderror
       </div>
    </div>
<!--gender-->
    <div class="form-group-radio">
      <label class="form-label">性別<span>※</span></label>
      <input type="radio" name="gender" value="男性" {{ old('gender', $input['gender'] ?? '') == '男性' ? 'checked' : '' }}> 男性
       @error('gender')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="radio" name="gender" value="女性" {{ old('gender', $input['gender'] ?? '') == '女性' ? 'checked' : '' }}> 女性
         @error('gender')
            <p class="error">{{ $message }}</p>
        @enderror

          <input type="radio" name="gender" value="その他" {{ old('gender', $input['gender'] ?? '') == 'その他' ? 'checked' : '' }}> その他
         @error('gender')
            <p class="error">{{ $message }}</p>
        @enderror
        </div>
<!--email-->
    <div class="form-group">
      <label class="form-label">メールアドレス<span>※</span></label>
      <input type="text" name="email" value="{{ old('email', $input['email'] ?? '')}}" placeholder="例：test@example.com">
       @error('email')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
<!--tel-->
    <div class="form-group">
      <label class="form-label">電話番号<span>※</span></label>
      <input type="tel" name="tel1" value="{{ old('tel1', $input['tel1'] ?? '')}}" placeholder="080">-
       @error('tel1')
            <p class="error">{{ $message }}</p>
        @enderror

      <input type="tel" name="tel2" value="{{ old('tel2', $input['tel2'] ?? '')}}" placeholder="1234">-
       @error('tel2')
            <p class="error">{{ $message }}</p>
        @enderror

      <input type="tel" name="tel3" value="{{ old('tel3', $input['tel3'] ?? '')}}" placeholder="5678">
       @error('tel3')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
<!--address-->
    <div class="form-group">
      <label class="form-label">住所<span>※</span></label>
      <input type="text" name="address" value="{{ old('address', $input['address'] ?? '')}}" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
       @error('address')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
<!--building-->
    <div class="form-group">
      <label class="form-label">建物名</label>
      <input type="text" name="building" value="{{ old('building', $input['building'] ?? '')}}" placeholder="例：千駄ヶ谷マンション101">
       @error('building')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
<!--category-->
    <div class="form-group">
      <label class="form-label">お問い合わせの種類<span>※</span></label>
      < name="category_id" >
        <option class="form-select" value="0" disabled selected hidden>選択してください</option>
        
        @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="error">{{ $message }}</p>
        @enderror
       </div>
<!--message-->
      <div class="form-group">
      <label class="form-label">お問い合わせ内容<span>※</span></label>
      <textarea name="message" placeholder="お問い合わせ内容をご記載ください">{{ old('message', $input['message'] ?? '') }}</textarea>
      @error('message')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
<!--submit-->
    <div class="form-button">
        <button class="form-button-submit" type="submit">確認画面</button>
    </div>
    </div>
    </form>
    </div>
    </div>
    @endsection
