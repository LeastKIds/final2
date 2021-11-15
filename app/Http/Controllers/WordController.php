<?php

namespace App\Http\Controllers;

use App\Models\Voca;
use App\Models\Word;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WordController extends Controller
{
    //
    public function index($voca_id) {
        $id = auth() -> user() -> id;
        $words = Word::where('voca_id', $voca_id) -> get();
        if($words[0] -> user_id != $id)
            return Inertia::render('Error/Error_BadConnection');

        return ['success' => 1, 'message' =>'불러오기 성공', 'words' => $words];
    }



    public function store(Request $request, $voca_id) {

        $voca = Voca::find($voca_id);
        $id = auth() -> user() -> id;
        if($voca -> user_id != $id)
            return Inertia::render('Error/Error_BadConnection');

        if(!$request -> kannzi && !$request -> hiragana)
            return ['success' => 40, 'message' => '한자랑 히라가나 둘 중 하나는 꼭 있어야 해요'];
        if(!$request -> korean)
            return ['success' => 41, 'message' => '한글이 꼭 있어야 해요!'];


        $word = new Word();
        $word -> korean = $request -> korean;
        if($request -> kannzi)
            $word -> kannzi = $request -> kannzi;
        if($request -> hiragana)
            $word -> hiragana = $request -> hiragana;


        $word -> voca_id = $voca_id;
        $word -> user_id = $id;
        $word -> save();

        return ['success' => 1, 'message' => '저장 성공', 'request' => $request];
    }

    public function destroy($word_id) {
        $id = auth() -> user() -> id;
        $word = Word::find($word_id);
        if($word -> user_id != $id)
            return Inertia::render('Error/Error_BadConnection');

        $word -> delete();

        return ['success' => 1, 'message' =>'삭제 성공'];
    }
}
