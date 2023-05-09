<div class="flex-1">
 <x-button label="sample text" dark wire:click="smsSend" spinner="smsSend" />
 {{-- 
  <div class="bg-white dark:bg-gray-800 shadow px-4 md:px-10 pb-5
    flex-1 ">
    <table class="w-full whitespace-nowrap">
      <thead>
        <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
          <th class="font-normal text-left pl-4"></th>
          <th class="font-normal text-left pl-12">Full Name</th>
          <th class="font-normal text-left pl-12">Birthdate</th>
          <th class="font-normal text-left pl-20">Address</th>
          <th class="font-normal text-left pl-20">Status</th>

        </tr>
      </thead>
      <tbody class="w-full">
        @forelse ($requests as $key=> $request)
          <tr tabindex="0"
            class="focus:outline-none h-20 text-sm leading-none text-gray-800 dark:text-white  bg-white dark:bg-gray-800  hover:bg-gray-100 dark:hover:bg-gray-900  border-b border-t border-gray-100 dark:border-gray-700 ">
            <td class="pl-4 cursor-pointer">
              <div class="flex items-center">
                <div class="w-10 h-10">
                  <x-avatar md squared
                    label="  {{ $request->user->user_information->firstname[0] . '' . $request->user->user_information->lastname[0] }}" />
                </div>
                <div class="pl-4">
                  <p class="font-medium">Request Documents by
                    {{ $request->user->user_information->firstname . ' ' . $request->user->user_information->lastname }}
                  </p>
                  <p class="text-xs leading-3 text-gray-600 dark:text-gray-200  pt-2">{{ $request->created_at }} |
                    <x-button label="validate Info" 2xs positive icon="eye" rounded
                      wire:click="validateRequest({{ $request->user_id }})"
                      spinner="validateRequest({{ $request->user_id }})" />
                  </p>
                </div>
              </div>
            </td>
            <td class="pl-12">
              {{ $request->firstname }} {{ $request->lastname }}
            </td>
            <td class="pl-12">
              {{ \Carbon\Carbon::parse($request->birthdate)->format('F d, Y') }}
            </td>
            <td class="pl-20">
              {{ $request->address }}
            </td>
            <td class="pl-20">
              <x-badge label="Pending" warning rounded />
            </td>
            <td class="px-7 pr-10 2xl:px-0" wire:key="{{ $key }}">
              <x-dropdown>
                <x-dropdown.header label="Options">
                  <div class="flex mt-1 flex-col">
                    <x-button flat positive label="Approve" class="w-full"
                      wire:click="approveRequest({{ $request->id }})" spinner="approveRequest({{ $request->id }})"
                      icon="thumb-up" />
                    <x-button flat negative label="Reject" class="w-full" icon="thumb-down" />
                  </div>
                </x-dropdown.header>
              </x-dropdown>
            </td>
          </tr> 
        @empty
          <div>
            <p class="text-center text-gray-600 dark:text-gray-200">No Requests</p>
          </div>
        @endforelse
      </tbody>
    </table>
  </div> --}}

 <div>
  {{ $this->table }}
 </div>
 <x-modal wire:model.defer="validate_modal" align="center">
  <x-card title="Request">
   <div>
    <div class="">
     <div class="">
      <h3 class="text-base font-semibold leading-6 text-gray-900">Applicant Information</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
     </div>
     <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
      <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
       <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Full name</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ ($infos->firstname ?? '') . ' ' . ($infos->lastname ?? '') }}
        </dd>
       </div>
       <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Birthdate</dt>
        <dd class="mt-1 text-sm text-gray-900">
         {{ \Carbon\Carbon::parse($infos->birthdate ?? null)->format('F, d Y') }}
        </dd>
       </div>
       <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">Address</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $infos->address ?? '' }}</dd>
       </div>

       <div class="sm:col-span-2">
        <dt class="text-sm font-medium text-gray-500">Notes</dt>
        <dd class="mt-1 text-sm text-gray-900">{{ $infos->notes ?? '' }}
        </dd>
       </div>

      </dl>
     </div>
    </div>

   </div>

   <x-slot name="footer">
    <div class="flex justify-end gap-x-4">
     <x-button flat negative label="Close" x-on:click="close" />
    </div>
   </x-slot>
  </x-card>
 </x-modal>

 <x-modal wire:model.defer="reject_modal" align="center">
  <x-card>
   <div>
    <x-textarea label="Message" placeholder="write your remarks" wire:model.defer="remarks" />
   </div>

   <x-slot name="footer">
    <div class="flex justify-end gap-x-4">
     <x-button flat label="Cancel" x-on:click="close" />
     <x-button negative label="Reject Request" right-icon="arrow-right" wire:click="rejectRequest"
      spinner="rejectRequest" />
    </div>
   </x-slot>
  </x-card>
 </x-modal>
</div>
