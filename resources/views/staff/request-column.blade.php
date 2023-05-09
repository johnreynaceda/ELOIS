<div>
  @php
    $request = \App\Models\RequestTransaction::where('id', $getRecord()->id)->first();
  @endphp
  <div class="flex items-center p-2">
    <div class="w-10 h-10">
      <x-avatar md squared class="uppercase"
        label="{{ $request->user->user_information->firstname[0] . '' . $request->user->user_information->lastname[0] }}" />
    </div>
    <div class="pl-2">
      <P class="font-medium">Request Notarized by
        {{ $request->user->user_information->firstname . ' ' . $request->user->user_information->lastname }}
      </p>
      <p class="text-xs leading-3 text-gray-600 dark:text-gray-200">
        {{ \Carbon\Carbon::parse($request->created_at)->format('F d, Y') }} |
        <x-button label="validate Info" 2xs positive icon="eye" rounded
          wire:click="validateRequest({{ $getRecord()->id }})" />
      </p>
    </div>
  </div>


</div>
