<?php

namespace App\Http\Controllers;

use App\Models\Voca;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    //

    public function index() {
        $voca = Voca::where('open', 1) -> with('user') -> latest() -> paginate(12);
        return ['success' => 1, 'message'=>'성공', 'voca' => $voca];
    }

    public function search($search) {
        $voca = Voca::where('open',1)-> with('user')
            -> where('title', 'like', '%'.$search.'%') -> latest() -> paginate(12);

        return ['voca' => $voca];
    }

}
