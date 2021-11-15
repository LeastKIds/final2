<?php

namespace App\Http\Controllers;

use App\Models\Voca;
use Illuminate\Http\Request;
use Inertia\Inertia;

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

        return ['success' => 1, 'message' => '성공적으로 저장', 'voca'=>$voca];
    }

    public function update(Request $request, $id) {
        $user_id = auth() -> user() -> id;
        $voca = Voca::find($id);
        if($voca -> user_id != $user_id)
            return Inertia::render('Error/Error_BadConnection');

        if(!$request -> title) {
            return ['success' => 0, 'message' => '제목이 없어용'];
        }



        $voca -> title = $request -> title;
        if($request -> message)
            $voca -> message = $request -> message;
        $voca -> save();

        return ['success' => 1, 'message'=>'저장 성공', 'voca_u'=>$voca];


    }

    public function destroy($id) {

        $user_id = auth() -> user() -> id;
        $voca = Voca::find($id);
        if($voca -> user_id != $user_id)
            return Inertia::render('Error/Error_BadConnection');

        $voca -> delete();

        return ['success' => 1, 'message' =>'삭제 성공'];
    }
}
