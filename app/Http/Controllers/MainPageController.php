<?php

namespace App\Http\Controllers;

use App\Models\Voca;
use App\Models\Word;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainPageController extends Controller
{
    //

    public function index() {
        return Inertia::render('Main/Main');
    }

    public function index_my() {
        return Inertia::render('Main/MyVoca');
    }

    public function index_words($id) {
        $user_id = auth() -> user() -> id;
        if(Voca::where('id', $id) -> doesntExist()) {
            return Inertia::render('Error/Error_404');
        }
        $voca = Voca::find($id);
        if($voca -> user_id != $user_id)
            return Inertia::render('Error/Error_404');

        $words = Word::where('voca_id', $id) -> get();

        return Inertia::render('Main/CreateWords', ['voca' => $voca, 'words' => $words]);
    }
}
