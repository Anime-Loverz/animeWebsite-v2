<x-app-layout>
  <x-slot name="header">
  </x-slot>

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="pt-0 pb-12 flex justify-center">
    <div class="md:w-2/3 w-11/12 mt-15">
      <div class="text-center">
        <a href="{{ $private->link }}" target="_blank" class="text-base text-indigo-600 font-semibold tracking-wide uppercase">tonton sekarang</a>
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          Detail Anime {{ $private->title }}
        </p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
          {{ $private->motivasi }}
        </p>
      </div>

      <div class="mt-13 flex md:justify-center">
        <dl class="w-full md:w-2/4 flex justify-between">
          <dt class="text-lg leading-6 font-medium text-gray-900">
            Genre : {{ $private->genre }}
          </dt>
          <dt class="text-lg leading-6 font-medium text-gray-900">
            Rating : @if ($private->score != 0) {{ $private->rating }} @else 0 @endif
          </dt>
        </dl>
      </div>
      <div class="mt-10 flex md:justify-center">
        <div class="justify-between w-full md:w-2/4 flex">
          <button id="btn" type="button" class=" transition duration-1000 ease-in-out border border-transparent text-base font-medium rounded-md bg-indigo-600 text-white hover:bg-indigo-700 py-3 px-3">
            Delete
          </button>
          <a href="{{ route('private.edit', $private->id) }}" class=" transition duration-1000 ease-in-out border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 py-3 px-3">
            Edit
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
              <!-- Heroicon name: exclamation -->
              <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                Delete List Anime
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  Are you sure you want to delete your list? your list will be permanently removed. This action cannot be undone.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <form action="{{ route('private.destroy', $private->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
              Delete
            </button>
          </form>
          <button id="cancel" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let btn = $('#btn');
    let mdl = $('#modal');
    let cancel = $('#cancel');
    btn.click(function() {
      mdl.toggleClass('hidden');
    });
    cancel.click(function() {
      mdl.toggleClass('hidden');
    });
  </script>

</x-app-layout>