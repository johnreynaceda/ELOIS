<x-secretary-layout>
  <header>
    <h2 class="text-xl font-bold uppercase text-gray-700">My Calendar</h2>
  </header>

  <div class="flex  p-10 gap-10 ">
    <div class="flex-1">
      <livewire:secretary.calendar />
    </div>
    <div class="w-72">
      <livewire:staff.client-request />
    </div>
  </div>


</x-secretary-layout>
