<div x-data="{ manage: @entangle('manage_directory') }">
  <div class="flex justify-between item-center">
    <x-button label="New Document" icon="plus" spinner="$set('add_modal', true)" positive
      wire:click="$set('add_modal', true)" />
    {{-- <x-button label="SMS" icon="chat-alt-2" dark wire:click="sendSms" spinner="sendSms" /> --}}

    <x-button label="Manage Directory" icon="folder-add" spinner="$set('add_modal', true)" slate
      wire:click="$set('manage_directory', true)" spinner="$set('manage_directory', true)" />
  </div>
  <div class="mt-2">
    {{ $this->table }}
  </div>

  <div x-show="manage" x-cloak class="relative z-10" aria-labelledby="slide-over-title" role="dialog"
    aria-modal="true">
    <div x-show="manage" x-cloak x-transition:enter="transition ease-in-out duration-500"
      x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in-out duration-500" x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 overflow-hidden">
      <div class="absolute inset-0 overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
          <!--
          Slide-over panel, show/hide based on slide-over state.

          Entering: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-full"
            To: "translate-x-0"
          Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-0"
            To: "translate-x-full"
        -->
          <div x-show="manage" x-cloak
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
            class="pointer-events-auto w-screen max-w-md">
            <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
              <div class="px-4 sm:px-6">
                <div class="flex items-start justify-between">
                  <h2 class="text-lg font-semibold leading-6 text-gray-900" id="slide-over-title">MANAGE DIRECTORY
                  </h2>
                  <div class="ml-3 flex h-7 items-center">
                    <button type="button" x-on:click="manage = false"
                      class="rounded-md bg-white text-gray-400 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                      <span class="sr-only">Close panel</span>
                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="relative mt-6 flex-1 px-4 sm:px-6">
                <div class="mb-3" x-animate>

                  @if ($add_directory == true)
                    <x-button label="Close" wire:click="$set('add_directory', false)" icon="x" negative sm />
                    <div class="mt-2 border rounded-lg p-4">
                      <x-input type="text" wire:model.defer="directory_name" label="Name"
                        placeholder="enter directory name" />

                      <div class="mt-2 flex justify-start">
                        <x-button label="Save" wire:click="saveDirectory" right-icon="save" spinner="saveDirectory"
                          positive sm />
                      </div>
                    </div>
                  @else
                    <x-button label="New Directory" wire:click="$set('add_directory', true)" icon="plus" positive
                      sm />
                  @endif
                </div>
                <ul role="list" class="divide-y divide-gray-200">
                  @forelse ($directories as $item)
                    <li class="py-2.5">
                      <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-blue-700"
                            width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                              d="M22 10H12v7.382c0 1.409.632 2.734 1.705 3.618H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2H21a1 1 0 0 1 1 1v4zm-8 2h8v5.382c0 .897-.446 1.734-1.187 2.23L18 21.499l-2.813-1.885A2.685 2.685 0 0 1 14 17.383V12z" />
                          </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                          <p class="truncate font-bold text-gray-700">{{ $item->name }}</p>
                          <p class="truncate text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</p>
                        </div>
                        <div>
                          <a href="#"
                            class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">View</a>
                        </div>
                      </div>
                    </li>
                  @empty
                    <div class="mt-3">No directory..</div>
                  @endforelse
                </ul>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <x-modal wire:model.defer="add_modal" align="center">
    <x-card title="Add New Document">
      <div class="grid grid-cols-2 gap-4">
        <x-input type="text" label="Name" placeholder="enter document name" wire:model.defer="name" />

        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Document Number</label>
          <div class="">
            <input type="text" wire:model="document_number" disabled
              class="block w-full rounded-md border-0 py-1.5 cursor-not-allowed text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-500 sm:text-sm sm:leading-6">
          </div>
        </div>

        <x-input label="Page Number" placeholder="ex. 500" wire:model.defer="page_number" />
        <x-input label="Book Number" placeholder="ex. 105" wire:model.defer="book_number" />
        <x-input label="Series Number" placeholder="ex. 2023" wire:model.defer="series_number" />
        <x-native-select label="Directory" wire:model="directory_id">
          <option selected hidden>Select Directory</option>
          @foreach ($directories as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </x-native-select>
      </div>
      <div class="mt-3 border-t py-2">
        <header class="text-lg uppercase font-bold text-gray-700">Attachment</header>
        <div class="mt-2">
          {{ $this->form }}
        </div>
      </div>
      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button positive label="Save" right-icon="save-as" wire:click="saveDocument" spinner="saveDocument" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

</div>
