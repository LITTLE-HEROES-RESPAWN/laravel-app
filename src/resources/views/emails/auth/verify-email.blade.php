@component('mail::message')

# {{ $appName }}にご登録くださりありがとうございます。

ログインIDは「{{ $user->login_id }}」です。

サービスの利用を開始するために、下のボタンを押してメールアドレスの確認を済ませてください。

@component('mail::button', compact('url'))
メールアドレスの確認
@endcomponent

{{ $appName }}

@slot('subcopy')
ボタンを押しても反応しない場合は、下記のリンクを直接ブラウザに貼り付けて遷移してください。<br>
URL:<span class="break-all">[{{ $url }}]({{ $url }})</span>
@endslot

@endcomponent