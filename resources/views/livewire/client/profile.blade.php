<div>
  <section class="bg-white rounded-lg shadow p-4">
    <div class="">
      <div class="flex justify-between items-center">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-base font-semibold leading-6 uppercase text-gray-900">Personal Information</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500"> details and application.</p>
        </div>
        <div>
          <x-button label="Update" positive icon="pencil-alt" class="font-bold"
            wire:click="updateInfo({{ auth()->user()->id }})" sm />
        </div>
      </div>
      <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">First Name</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ auth()->user()->user_information->firstname ?? 'NULL' }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Middle Name</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ auth()->user()->user_information->middlename ?? 'NULL' }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Last Name</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ auth()->user()->user_information->lastname ?? 'NULL' }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Birth Date</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ auth()->user()->user_information->birthdate ?? 'NULL' }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Address</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ auth()->user()->user_information->address ?? 'NULL' }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Phone Number</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ auth()->user()->user_information->contact ?? 'NULL' }}</dd>
          </div>

        </dl>
      </div>
    </div>

  </section>
  <div class="mt-2">
    <x-button label="Back" icon="arrow-left" href="{{ route('client.dashboard') }}" dark sm />
  </div>
  <x-modal wire:model.defer="request_modal" max-width="xl" align="center">
    <x-card title="Update Information">
      <div>
        <div class=" border-gray-200 px-4 py-5 sm:px-6">
          <dl class="grid grid-cols-1 gap-x-3 gap-y-3 sm:grid-cols-2">
            <div class="sm:col-span-1">
              <x-input label="First Name" wire:model.defer="firstname" placeholder="" />
            </div>
            <div class="sm:col-span-1">
              <x-input label="Middle Name" wire:model.defer="middlename" placeholder="" />
            </div>
            <div class="sm:col-span-1">
              <x-input label="Last Name" wire:model.defer="lastname" placeholder="" />
            </div>
            <div class="sm:col-span-1">
              <x-datetime-picker label="Birthdate" wire:model.defer="birthdate" without-time placeholder="" />
            </div>
            <div class="sm:col-span-1">
              <x-input label="Address" wire:model.defer="address" placeholder="" />
            </div>
            <div class="sm:col-span-1">
              <x-input label="Phone Number" wire:model.defer="contact" placeholder="" />
            </div>
          </dl>
        </div>

      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button positive label="Save Information" wire:click="saveInformation" spinner="saveInformation"
            right-icon="arrow-right" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>
</div>
