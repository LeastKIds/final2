<?php

namespace App\Http\Controllers;

use App\Models\Voca;
use Illuminate\Http\Request;

class VocaController extends Controller
{
    //
    public function index_my(){
        $id = auth() -> user() -> id;

        $voca = Voca::where('user_id', $id) -> latest() -> paginate(8);

        return $voca;

    }
}
