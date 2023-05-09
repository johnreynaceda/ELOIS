<div>
  <div wire:click="$set('add_modal', true)"
    class="sm:rounded-tr-lg relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
    <div>
      <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
        <!-- Heroicon name: outline/check-badge -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-600" width="24" height="24">
          <path fill="none" d="M0 0h24v24H0z" />
          <path
            d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zM4 9v10h16V9H4zm2 2h2v2H6v-2zm0 4h2v2H6v-2zm4-4h8v2h-8v-2zm0 4h5v2h-5v-2z" />
        </svg>
      </span>
    </div>
    <div class="mt-8">
      <h3 class="text-lg font-medium">
        <a href="#" class="focus:outline-none">
          <span class="absolute inset-0" aria-hidden="true"></span>
          Request Appointment
        </a>
      </h3>
      <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et
        dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
    </div>
    <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
        <path
          d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
      </svg>
    </span>
  </div>
  <x-modal wire:model.defer="add_modal" align="center" max-width="lg">
    <x-card title="Appointment Request">
      <div class="flex flex-col space-y-3">
        <x-native-select label="Lawyer" wire:model="lawyer_id">
          <option selected hidden>Select Lawyer</option>
          @foreach ($lawyers as $item)
            <option value="{{ $item->id }}">{{ $item->firstname . ' ' . $item->lastname }}</option>
          @endforeach

        </x-native-select>
        <x-input label="Event Name" wire:model="name" placeholder="" />
        <div class="grid grid-cols-2 gap-4 mt-2">
          <x-datetime-picker label="Start Date" placeholder="Appointment Date" without-time
            wire:model.defer="start_date" />
          <x-time-picker label="AM/PM" placeholder="12:00 AM" wire:model.defer="start_time" />
        </div>
        <div class="grid grid-cols-2 gap-4 mt-3">
          <x-datetime-picker label="End Date" placeholder="Appointment Date" without-time wire:model.defer="end_date" />
          <x-time-picker label="AM/PM" placeholder="12:00 AM" wire:model.defer="end_time" />
        </div>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button positive label="Send Request" wire:click="sendRequest" spinner="sendRequest"
            right-icon="arrow-right" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>
</div>
