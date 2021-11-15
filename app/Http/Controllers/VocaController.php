<?php

namespace App\Http\Controllers;

use App\Models\Voca;
use Illuminate\Http\Request;

class VocaController extends Controller
{
    //
    public function index_my(){

        $id = auth() -> user() -> id;

        $voca = Voca::where('user_id', $id)-> with('user') -> latest() -> paginate(12);

        return $voca;

    }

    public function store(Request $request) {
        if(!$request -> title) {
            return ['success' => 0, 'message' => '제목이 없어용'];
        }


        $voca = new Voca();
        $voca -> title = $request-> title;

        $voca -> user_id = auth() -> user() -> id;
        if($request -> message)
            $voca -> message = $request -> message;
        $voca -> save();

        return ['success' => 1, 'message' => '성공적으로 저장'];
    }
}
