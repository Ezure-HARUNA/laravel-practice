<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function index()
    {
        $values = Test::all();
        $count = Test::count();
        $first = Test::findOrFail(1);
        $whereBBB = Test::where('text', '=', 'bbb')->get();

        //エロクワント vs クエリビルダ
        //どっちもセキュリティ面で優れている
        //エロクワントの方がDBの連結やクエリの分割などにおいて便利

        //クエリビルダ 基本getでとる
        $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
            ->select('id', 'text')
            ->get();

        dd($values, $count, $first, $whereBBB, $queryBuilder);

        //dd($values);
        return view('tests.test', compact('values'));
    }
}
