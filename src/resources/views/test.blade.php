@extends('layouts.app')

@section('title', 'Blade Test')

@section('content')
    <x-card>
        <x-slot name="title">
            Laravel教材【基礎編】
        </x-slot>

        <p class="card-text">
            ここから本当の意味で基礎編がスタートします。頑張っていきましょう。
        </p>
        <p class="card-text">
            ちなみにこれはニューモーフィズム（neumorphism）というデザインです。
            新しいものでもないですが、柔らかい感じが結構いいですよね。
        </p>
        <p class="card-text">
            スタイルシートを外部から読み込んでいるので、インターネットに接続できていないとうまく表示されません。
        </p>

        <x-slot name="actions">
            <button class="btn neumorphism neu-flat">FLAT</button>
            <button class="btn neumorphism neu-concave">CONCAVE</button>
            <button class="btn neumorphism neu-convex">CONVEX</button>
            <button class="btn neumorphism neu-pressed">PRESSED</button>
        </x-slot>
    </x-card>
@endsection
