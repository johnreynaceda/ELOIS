<div>
  <div>
    <x-button label="New Client" icon="plus" spinner="$set('add_modal', true)" positive
      wire:click="$set('add_modal', true)" />
    {{-- <x-button label="Send SMS" wire:click="sendSms" /> --}}
  </div>
  <div class="mt-2">
    {{ $this->table }}
  </div>

  <x-modal wire:model.defer="add_modal" align="center">
    <x-card title="ADD NEW CLIENT">
      <div>
        <div class="grid grid-cols-6 gap-3">
          <div class="col-span-2">
            <x-input wire:model.defer="firstname" label="First Name" />
          </div>
          <div class="col-span-2">
            <x-input wire:model.defer="middlename" label="Middle Name" />
          </div>
          <div class="col-span-2">
            <x-input label="Last Name" wire:model.defer="lastname" />
          </div>
          <div class="col-span-2">
            <x-datetime-picker label="Birthdate" wire:model.defer="birthdate" without-time />
          </div>
          <div class="col-span-2">
            <x-input label="Address" wire:model.defer="address" />
          </div>
          <div class="col-span-2">
            <x-input label="Contact" wire:model.defer="contact" />
          </div>
        </div>
      </div>
      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button positive label="Save" wire:click="addClient" spinner="addClient" icon="save-as" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>
</div>
