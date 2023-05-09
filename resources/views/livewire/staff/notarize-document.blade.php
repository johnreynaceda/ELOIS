<div>
  <div>
    <div class="flex w-full justify-between items-center">
      <h3 class="font-medium text-gray-700">Notarize Documents</h3>
      <x-button label="Upload" icon="upload" wire:click="$set('upload_modal', true)" positive xs />
    </div>
    <dl class="mt-2 divide-y
                  divide-gray-200 border-t border-b border-gray-200">
      @forelse ($documents as $item)
        <div class="flex-1  py-3 text-sm font-medium">
          <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
            </div>
            <div class="min-w-0 flex-1">
              <p class="truncate text-sm font-medium uppercase text-gray-700">{{ $item->name }}</p>
              <p class="truncate text-xs text-gray-500">Date Upload:
                {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</p>
            </div>
            <div>
              <x-button label="Download" icon="download" wire:click="fileDownload({{ $item->id }})"
                spinner="fileDownload({{ $item->id }})" slate xs />
            </div>
          </div>
        </div>
      @empty
        <div class="mt-1">
          <p class="text-center text-gray-500">No documents uploaded yet.</p>
        </div>
      @endforelse
    </dl>
  </div>
  <x-modal wire:model.defer="upload_modal" align="center" max-width="md">
    <x-card title="Upload Document">
      <div class="flex justify-end">

      </div>
      <form wire:submit.prevent="save">
        {{ $this->form }}


        <x-slot name="footer">
          <div class="flex justify-end gap-x-4">
            <x-button flat label="Cancel" x-on:click="close" />
            <x-button type="submit" wire:click="save" spinner="save" positive label="Upload Document" icon="upload" />
          </div>
        </x-slot>
      </form>
    </x-card>
  </x-modal>
</div>
