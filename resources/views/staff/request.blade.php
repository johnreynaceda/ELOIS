<x-staff-layout>
  <header>
    <h2 class="text-2xl font-bold uppercase text-gray-700">Requests</h2>
  </header>

  <div class="flex  p-10 gap-10">
    <div class="flex-1">
      <livewire:staff.requests />
    </div>
    <div class=" w-72">
      <livewire:staff.client-request />
    </div>
  </div>
</x-staff-layout>
