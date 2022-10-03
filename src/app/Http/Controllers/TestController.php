<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * test.blade.phpを表示する
     *
     * @return View
     */
    public function test(): View
    {
        return view('test');
    }

    /**
     * now.blade.phpに現在時刻を渡して表示する
     *
     * @return View
     */
    public function now(): View
    {
        $now = (new Carbon())->format('Y-m-d H:i:s');
        return view('now', compact('now'));
    }
}
