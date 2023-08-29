<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\TxtService;
use App\Traits\Csv;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use Csv;
    /**
     * ユーザー一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * ユーザー詳細
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * CSVダウンロード
     *
     * @return \Illuminate\Http\Response
     */
    public function download(TxtService $filesystem)
    {
        // ユーザー一覧の取得
        $users = User::all();

        // 出力する情報
        $csvHeaders = [
            'id', 'name', 'email', 'login_id', 'created_at'
        ];

        // データの整形
        $data = $users->map(
            fn (User $user) => $user->only($csvHeaders)
        )->prepend($csvHeaders);

        return $filesystem->downloadResponse($data);
    }
}
