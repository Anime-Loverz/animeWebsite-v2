<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutocompleteController extends Controller
{
    function fetchGenre(Request $request)
    {
        $query = $request->get('query');

        $kondisi = DB::table('ajax')
            ->where('for', '=', 'genre')
            ->where('value', 'LIKE', "{$query}%")->exists();

        if ($query && $kondisi) {
            $data = DB::table('ajax')
                ->where('for', '=', 'genre')
                ->where('value', 'LIKE', "{$query}%")
                ->get();
            $output =  '<div class="origin-top-right right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100">';
            foreach ($data as $row) {
                $output .= '<div class="py-1"> <a href="#" class="pilih block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">'.$row->value.'</a> </div>';
                $output .= '</div>';
                return $output;
            }
        } 
        elseif (!$kondisi) {
            $err =  '<div class="origin-top-right right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100">';
            $err .= '<div class="py-1"> <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Genre tidak di temukan!</a> </div>';
            $err .= '</div>';
            return $err;
        }
        else {
            $kosong = '';
            return $kosong;
        }
    }
}
