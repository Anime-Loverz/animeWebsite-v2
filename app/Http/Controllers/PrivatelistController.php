<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnimeRequest;
use App\Http\Requests\UpdateAnimeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class PrivatelistController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('anime_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $email = $request->session()->get('emails');
        $id = User::where('email', $email)->select('id')->get();
        $list = Anime::where('user_id', $id[0]->id)->paginate(5);
        return view('anime.privateList', compact('list'));
    }

    public function create()
    {
        abort_if(Gate::denies('anime_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('anime.add');
    }

    public function store(StoreAnimeRequest $request)
    {
        $request->title = Str::title($request->title);
        $request->genres = Str::title($request->genres);
        $request->motivasi = Str::ucfirst($request->motivasi);
        $request->sinopsis = Str::ucfirst($request->sinopsis);

        $email = $request->session()->get('emails');
        $id = User::where('email', $email)->select('id')->get();
        Anime::create(
            [
                'title' => $request->title,
                'genre' => $request->genres,
                'motivasi' => $request->motivasi,
                'sinopsis' => $request->sinopsis,
                'status' =>  intval($request->status),
                'user_id' => $id[0]->id
            ]
        );

        return redirect()->route('private.index')->with('status', 'List Berhasil di tambah');
    }

    public function show(Anime $private)
    {
        abort_if(Gate::denies('anime_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('anime.detailPrivate', compact('private'));
    }

    public function edit(Anime $private, Request $request)
    {
        abort_if(Gate::denies('anime_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $email = $request->session()->get('emails');
        $id = User::where('email', $email)->select('id')->get();
        $check = Anime::select('title')
            ->where([
                ['user_id', '=', $id[0]->id],
                ['id', '=', $private->id]
            ])
            ->exists();

        if (!$check) {
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('anime.edit', compact('private'));
    }

    public function update(UpdateAnimeRequest $request, Anime $private)
    {
        $request->title = Str::title($request->title);
        $request->genres = Str::title($request->genres);
        $request->motivasi = Str::ucfirst($request->motivasi);
        $request->sinopsis = Str::ucfirst($request->sinopsis);

        $private->title = Str::title($private->title);
        $private->genre = Str::title($private->genre);
        $private->motivasi = Str::ucfirst($private->motivasi);
        $private->sinopsis = Str::ucfirst($private->sinopsis);

        $email = $request->session()->get('emails');
        $id = User::where('email', $email)->select('id')->get();

        if (Gate::allows('user_access')){
            $private->update([
                'title' => $request->title,
                'genre' => $request->genres,
                'motivasi' => $request->motivasi,
                'sinopsis' => $request->sinopsis,
                'status' => intval($request->status),
            ]);
        }else {
            $private->update([
                'title' => $request->title,
                'genre' => $request->genres,
                'motivasi' => $request->motivasi,
                'sinopsis' => $request->sinopsis,
                'status' => intval($request->status),
                'user_id' => $id[0]->id
            ]);
        }


        return redirect()->route('private.index')->with('status', 'List Berhasil di edit');
    }

    public function destroy(Anime $private)
    {
        abort_if(Gate::denies('anime_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $private->delete();

        return redirect()->route('private.index')->with('status', 'List Berhasil di hapus');
    }
}
