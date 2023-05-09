<div>
  <span class="hover:text-gray-600  text-green-600 cursor-pointer"
    wire:click="downloadFile({{ $getRecord()->lawCasesAttachments->first()->id }})">
    {{ $getRecord()->lawCasesAttachments->first()->path }}
  </span>
</div>
