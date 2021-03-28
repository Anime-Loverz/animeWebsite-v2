<?php

namespace App\Http\Requests;

use App\Rules\ValidGenre;
use App\Rules\ValidWord;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateAnimeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'required', 'max:25', 'unique:animes,title,' . request()->route('private')->id,
            ],
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
