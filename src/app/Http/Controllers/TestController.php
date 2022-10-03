<?php

namespace App\Http\Controllers;

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
}
