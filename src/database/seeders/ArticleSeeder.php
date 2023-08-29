<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 登録済みユーザー全取得
        $users = User::all();

        // 基本設計
        $factory = Article::factory()->count(10);

        // 各ユーザーに対して処理
        $users->each(function ($user) use ($factory) {
            // ユーザー指定
            $factory = $factory->for($user);

            // 各種登録
            $factory->create();  // 非公開・未削除（デフォルト）
            $factory->confirmed()->create(); // 公開・未削除
            $factory->trashed()->create(); // 非公開・削除
            $factory->confirmed()->trashed()->create(); // 公開・削除
        });
    }
}
