<?php

namespace App\Http\Requests;

use App\Rules\ValidGenre;
use App\Rules\ValidWord;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreAnimeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|unique:animes,title|max:25',
            'genres' => [
                'required', new ValidGenre(), new ValidWord()
            ],
            'status' => 'nullable|regex:/1/',
            'link' => 'nullable|url',
            'motivasi' => 'nullable|regex:/^[a-zA-Z0-9_\s\-\,\.\~\:]*$/',
            'sinopsis' => 'nullable|regex:/^[a-zA-Z0-9_\s\-\,\.\~\:]*$/',
        ];
    }

    public function authorize()
    {
        return Gate::allows('anime_access');
    }
}