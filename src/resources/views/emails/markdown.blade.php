<x-mail::message subcopy="サブテキスト1">

# h1:テストメール

## h2 texttexttexttext

### h3 texttexttexttext

#### h4 texttexttexttext

##### h5 texttexttexttext

###### h6 texttexttexttext

通常テキスト p

<x-mail::button url="http://localhost" color="success">
ボタン
</x-mail::button>

<x-mail::subcopy>
サブテキスト2
</x-mail::subcopy>

<x-mail::panel>
パネル
</x-mail::panel>

<x-mail::table>
| Laravel       | テーブル         | 例  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
</x-mail::table>

</x-mail::message>