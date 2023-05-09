<div>
 <div>
  <div>
   <div class="">
    <h3 class="text-base font-semibold leading-6 text-gray-900">Applicant Information</h3>
    <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
   </div>
   <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
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
     <div class="sm:col-span-2">
      <x-input label="Address" wire:model.defer="address" placeholder="" />
     </div>
     <div class="sm:col-span-2">
      <x-textarea label="Notes" wire:model.defer="notes" placeholder="write your notes" />
     </div>
    </dl>
   </div>
  </div>
  <div class="mt-3">
   <x-native-select label="Document" wire:model="category">
    <option selected hidden>Select an option</option>
    <option value="1">Deed of Sale</option>
    <option value="2">Affidavit of Loss</option>
   </x-native-select>
  </div>
 </div>
 <div class="flex justify-end gap-x-4 mt-5">
  <x-button flat label="Cancel" x-on:click="close" />
  <x-button positive label="Request Send" wire:click="sendRequest" spinner="sendRequest" right-icon="arrow-right" />
 </div>

 <x-modal wire:model.defer="request_modal" max-width="2xl" align="center">
  <x-card title="DEED OF SALE FORM">
   <div>
    <div class="grid grid-cols-2 gap-4">
     <x-input label="Vendor Name" wire:model.defer="vendor_name" placeholder="" />
     <x-input label="Vendor Address" wire:model.defer="vendor_address" placeholder="" />
     <x-input label="Vendee Name" placeholder="" wire:model.defer="vendee_name" />
     <x-input label="Vendee Address" placeholder="" wire:model.defer="vendee_address" />
     <x-input label="Amount" placeholder="" wire:model.defer="amount" />
    </div>
    <div class="mt-4 border-t pt-3 grid grid-cols-4 gap-4">
     <x-input label="Make" placeholder="" wire:model.defer="make" />
     <x-input label="MV file no." placeholder="" wire:model.defer="mv_file_no" />
     <x-input label="Classification" placeholder="" wire:model.defer="classification" />
     <x-input label="Type of Body" placeholder="" wire:model.defer="type_of_body" />
     <x-input label="Color" placeholder="" wire:model.defer="color" />
     <x-input label="Chassis no." placeholder="" wire:model.defer="chassis_no" />
     <x-input label="Plate no." placeholder="" wire:model.defer="plate" />
    </div>
   </div>
   <x-slot name="footer">
    <div class="flex justify-end gap-x-4">
     <x-button flat positive right-icon="arrow-right" label="Save and Close" x-on:click="close" />

    </div>
   </x-slot>
  </x-card>
 </x-modal>
</div>
