<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ]
  }
  ```
-->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add List Anime') }}
        </h2>
    </x-slot>

    <div class="mt-1">
        <form action="{{ route('private.store') }}" method="POST">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="ml-12 md:ml-52">
                        <div class="mb-5">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" value="{{ old('title') }}" name="title" id="title" class="mt-1 form-input w-full md:w-3/6 text-gray-700" placeholder="title anime">
                            @error('title') <p class="mt-1"><span class="px-1 font-semibold rounded-full bg-red-400 text-white"> {{ $message }} </span></p>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                            <div class="w-full md:w-3/6 inline-flex flex-wrap items-center shadow-sm z-10  appearance-none bg-white border rounded-md text-base px-2 py-2">
                                <input type="text" value="{{ old('genre') }}" id="genre" placeholder="What Genre ?" class=" text-gray-700 text-xs tracking-normal leading-4 flex-grow h-7 box-border outline-none" autocomplete="off">
                            </div>
                            @error('genres') <p class="mt-1"><span class="px-1 font-semibold rounded-full bg-red-400 text-white"> {{ $message }} </span></p>
                            @enderror
                            <div id="genre-list"></div>
                        </div>

                        <div class="mb-5">
                            <label for="link" class="block text-sm font-medium text-gray-700">Tempat Nonton</label>
                            <input type="text" name="link" value="{{ old('link') }}" id="link" placeholder="https://nanime.us" class="mt-1 form-input w-full md:w-3/6 text-gray-700">
                            @error('link')
                            <p class="mt-1"><span class="px-1 font-semibold rounded-full bg-red-400 text-white"> {{ $message }} </span></p>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="status" name="status" value=1 type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" @if (old('status')) checked @endif>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="status" class="font-medium text-gray-700">Perlihatkan ke Public?</label>
                                </div>
                            </div>
                        </div>


                        <div id="target" class="hidden">
                            <div class="mb-5">
                                <label for="motivasi" class="block text-sm font-medium text-gray-700">Motivasi</label>
                                <textarea rows="4" name="motivasi" id="motivasi" class="w-full md:w-3/6 resize-none mt-1 form-input text-gray-700">{{ old('motivasi') }}</textarea>
                                @error('motivasi')
                                <p class="mt-1"><span class="px-1 font-semibold rounded-full bg-red-400 text-white"> {{ $message }} </span></p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="sinopsis" class="block text-sm font-medium text-gray-700">Sinopsis</label>
                                <textarea rows="4" name="sinopsis" id="sinopsis" class="w-full md:w-3/6 resize-none mt-1 form-input text-gray-700">{{ old('sinopsis') }}</textarea>
                                @error('sinopsis')
                                <p class="mt-1"><span class="px-1 font-semibold rounded-full bg-red-400 text-white"> {{ $message }} </span></p>
                                @enderror
                            </div>
                        </div>

                        <div class="bg-white">
                            <button type="button" id="btn" class="mb-5 inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Opsi Lain
                            </button>
                            <button type="submit" class="mb-5 ml-48 sm:ml-96 md:ml-96 inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        let btn = $("#btn");
        let target = $("#target");
        let genre = $("#genre");

        btn.click(function() {
            target.toggleClass('hidden');
            target.hasClass('hidden') ? btn.text('Opsi Lain') : btn.text('Sembunyikan');
        });

        genre.on('keyup', function() {
            let query = $(this).val();

            if (query != '' || query != null) {
                let autocomplete = $("#genre-list");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "http://localhost/autocomplete/fetch",
                    method: "post",
                });

                $.ajax({
                    data: {
                        query: query
                    },
                    success: function(data) {
                        // console.log(data);
                        autocomplete.fadeIn();
                        autocomplete.html(data);
                    }
                });

            }

        });
        
        let arr = [$("div strong").text()];
        arr.shift();
        $("form").on('click', 'a', function() {
            // genre.val($(this).text());

            arr.push($(this).text());
            console.log(arr);

            let hide = `<input type="hidden" name="genres" value="${arr}">`;
            let value = `<strong class="inline-flex my-1.5 mr-2 bg-cool-gray-300 normal-case text-center rounded-sm pl-1.5 pr-1 h-4 no-underline text-xs py-0 tracking-normal font-normal cursor-pointer box-border items-center">${$(this).text()}<svg data-icon="cross" style="fill: currentcolor;" viewBox="0 0 16 16" class="ml-1 w-3 h-3 box-border"><path d="M9.41 8l3.29-3.29c.19-.18.3-.43.3-.71a1.003 1.003 0 00-1.71-.71L8 6.59l-3.29-3.3a1.003 1.003 0 00-1.42 1.42L6.59 8 3.3 11.29c-.19.18-.3.43-.3.71a1.003 1.003 0 001.71.71L8 9.41l3.29 3.29c.18.19.43.3.71.3a1.003 1.003 0 00.71-1.71L9.41 8z" fill-rule="evenodd"></path></svg></strong>`;
            genre.before(value);
            genre.before(hide);
            genre.val('');
            $("#genre-list").fadeOut();
        });

        $("form").on('click', 'svg', function() {
            $(this).parent().remove();
        });
    </script>


</x-app-layout>