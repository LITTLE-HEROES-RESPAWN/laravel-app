<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\CreateConfirmRequest;
use App\Http\Requests\Article\DeleteRequest;
use App\Http\Requests\Article\EditRequest;
use App\Http\Requests\Article\ForceDeleteRequest;
use App\Http\Requests\Article\RestoreRequest;
use App\Http\Requests\Article\ShowRequest;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =  Article::where('confirmed', true)->paginate(15);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * 登録確認画面の表示
     *
     * @param  \App\Http\Requests\Article\CreateConfirmRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function createConfirm(CreateConfirmRequest $request)
    {
        $article = Article::make($request->validated());
        $user = $request->user();
        $article->user()->associate($user);
        $article->save();
        return view('articles.create_confirm', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Article\StoreRequest  $request
     * @param \App\models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Article $article)
    {
        // 公開確認完了
        $article->confirmed = true;
        // 保存
        $article->save();

        // ダッシュボードに遷移
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Requests\Article\ShowRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request, Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * 自分が所有する記事一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function myPage()
    {
        $articles = Article::where('user_id', Auth::id())->get();
        $title = 'マイページ';
        return view('articles.index', compact('articles', 'title'));
    }

    /**
     * 自分が所有する記事のゴミ箱
     *
     * @return \Illuminate\Http\Response
     */
    public function garbage()
    {
        $articles = Article::where('user_id', Auth::id())->onlyTrashed()->get();
        $title = 'ゴミ箱';
        return view('articles.index', compact('articles', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Requests\Article\EditRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRequest $request, Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Article\UpdateRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Article $article)
    {
        // 評価済み入力値を適用して保存
        $article->fill($request->validated())->save();

        // ダッシュボードに遷移
        return redirect()->route('dashboard');
    }

    /**
     * 削除確認
     *
     * @param  \App\Http\Requests\Article\DeleteRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroyConfirm(DeleteRequest $request, Article $article)
    {
        // 削除確認画面を表示
        return view('articles.destroy_confirm', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\Article\DeleteRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, Article $article)
    {
        // 削除
        $article->delete();

        // マイページに遷移
        return redirect()->route('articles.index.mypage');
    }
    /**
     * 削除済みデータの復元
     *
     * @param  \App\Http\Requests\Article\RestoreRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function restore(RestoreRequest $request, Article $article)
    {
        // 復元
        $article->restore();

        // マイページに遷移
        return redirect()->route('article.index.mypage');
    }

    /**
     * 完全削除確認
     *
     * @param  \App\Http\Requests\Article\ForceDeleteRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function forceDeleteConfirm(ForceDeleteRequest $request, Article $article)
    {
        // 削除確認画面に遷移
        return view('articles.force_delete_confirm', compact('article'));
    }

    /**
     * 完全削除
     *
     * @param  \App\Http\Requests\Article\ForceDeleteRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(ForceDeleteRequest $request, Article $article)
    {
        // 削除
        $article->forceDelete();

        // マイページに遷移
        return redirect()->route('articles.index.mypage');
    }
}
