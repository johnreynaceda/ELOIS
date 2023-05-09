<div x-data>

  <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    @if (auth()->user()->role_id == 1)
      <li class="col-span-1 divide-y divide-gray-200 rounded-lg border bg-white shadow">
        <div class="flex w-full items-center justify-between space-x-6 p-6">
          <div class="flex-1 truncate">
            <div class="flex items-center space-x-3">
              <svg class="w-5 h-5 text-gray-600" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 9H6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                <path
                  d="M15.5 11C14.1193 11 13 9.88071 13 8.5C13 7.11929 14.1193 6 15.5 6C16.8807 6 18 7.11929 18 8.5C18 9.88071 16.8807 11 15.5 11Z"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M6 6H9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M18 18L13.5 15L11 17L6 13" stroke="currentColor" stroke-linecap="round"
                  stroke-linejoin="round">
                </path>
                <path
                  d="M3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V20.4C21 20.7314 20.7314 21 20.4 21H3.6C3.26863 21 3 20.7314 3 20.4Z"
                  stroke="currentColor" stroke-width="1.5"></path>
              </svg>
            </div>
            <p class="mt-1 truncate font-bold text-gray-600">APPOINTMENT LIST</p>
          </div>
          <x-button.circle icon="printer" dark wire:click="printPreview(2)" spinner="printPreview(2)" />
        </div>
      </li>
    @else
      <li class="col-span-1 divide-y divide-gray-200 rounded-lg border bg-white shadow">
        <div class="flex w-full items-center justify-between space-x-6 p-6">
          <div class="flex-1 truncate">
            <div class="flex items-center space-x-3">
              <svg class="w-5 h-5 text-gray-600" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 9H6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                <path
                  d="M15.5 11C14.1193 11 13 9.88071 13 8.5C13 7.11929 14.1193 6 15.5 6C16.8807 6 18 7.11929 18 8.5C18 9.88071 16.8807 11 15.5 11Z"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M6 6H9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M18 18L13.5 15L11 17L6 13" stroke="currentColor" stroke-linecap="round"
                  stroke-linejoin="round">
                </path>
                <path
                  d="M3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V20.4C21 20.7314 20.7314 21 20.4 21H3.6C3.26863 21 3 20.7314 3 20.4Z"
                  stroke="currentColor" stroke-width="1.5"></path>
              </svg>
            </div>
            <p class="mt-1 truncate font-bold text-gray-600">REQUEST OF DOCUMENTS</p>
          </div>
          <x-button.circle icon="printer" dark wire:click="printPreview(1)" spinner="printPreview(1)" />
        </div>
      </li>
    @endif

  </ul>

  <x-modal wire:model.defer="print_modal" align="center" max-width="4xl">
    <x-card>
      <div class="bg-gray-100 rounded-lg mb-4 p-4 flex space-x-2">
        <x-datetime-picker label="Date from:" placeholder="{{ Carbon\Carbon::now()->format('m-d-y') }}"
          wire:model="datefrom" without-time />
        <x-datetime-picker label="Date to:" placeholder="{{ Carbon\Carbon::now()->format('m-d-y') }}"
          wire:model="dateto" without-time />
      </div>
      <div x-ref="printContainer">
        <h1 class="font-bold text-xl">ARMADA & HILARIO LAW OFFICES</h1>
        <h1 class="font-bold ">E-LOIS</h1>

        @switch($print_get)
          @case(1)
            @include('reports.request_of_documents')
          @break

          @case(2)
            @include('reports.appointment-list')
          @break

          @default
        @endswitch

      </div>
      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button dark label="PRINT" right-icon="printer" @click="printOut($refs.printContainer.outerHTML);" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>
</div>
