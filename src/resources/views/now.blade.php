@extends('layouts.app')

@section('title', 'Blade Test2')

@section('content')
    <x-card>
        <x-slot name="title">
            現在の時刻
        </x-slot>
        <p class="card-text">
            現在の時刻は、<b>{{ $now }}</b>です。（リロードすると時刻も更新されます。）
        </p>
        <p class="card-text">
            以下のボタンを押すと、{{ route('test') }}へと遷移します。
        </p>
        <x-slot name="actions">
            <button class="btn neumorphism neu-flat" onclick="location.href='{{ route('test') }}'">
                test.blade.phpで作った画面へ
            </button>
        </x-slot>
    </x-card>
@endsection
