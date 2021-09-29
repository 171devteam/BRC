<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ledger Book') }}
    </h2>
    <a href="{{ route('ledgers.import') }}" class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
      <span>Excel Import</span>
    </a>
    <a href="{{ route('ledgers.create') }}" class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center">
      <span>Create New</span>
    </a>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="container">
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <x-alert />
                    <table class="min-w-full divide-y divide-gray-200 table-auto">
                      Table
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pt-2">
            pagination
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>