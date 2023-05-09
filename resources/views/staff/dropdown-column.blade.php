<div>
 <div class=" flex space-x-1 items-center">
  <x-button label="Approve" icon="thumb-up" positive xs wire:click="approveRequest({{ $getRecord()->id }})" />
  <span class="h-6 border border-gray-700"></span>
  <x-button label="Reject" icon="thumb-down" wire:click="openRejectModal({{ $getRecord()->id }})" negative xs />
 </div>
</div>
