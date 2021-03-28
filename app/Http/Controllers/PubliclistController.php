<?php

namespace App\Http\Controllers;

use App\Models\Anime;

class PubliclistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Anime::where('status', 1)->paginate(5);

        $creator = Anime::join('users', 'users.id', '=', 'animes.user_id')
        ->where('status', 1)
        ->select('users.*')
        ->paginate(5);

        // foreach ($creator as $i => $v) {
        //     echo $v->profile_photo_path . "<br>";
        //     echo $v->name . "<br>";
        // }
        // die;

        return view('anime.publicList', compact('list', 'creator'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anime  $public
     * @return \Illuminate\Http\Response
     */
    public function show(Anime $public)
    {
        return view('anime.detailPublic', compact('public'));
    }
}
