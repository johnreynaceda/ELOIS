<x-client-layout>
 <div class="grid grid-cols-1 gap-4 lg:col-span-2">
  <!-- Welcome panel -->
  <section aria-labelledby="profile-overview-title">
   <div class="overflow-hidden rounded-lg bg-white shadow">
    <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
    <div class="bg-white p-6">
     <div class="sm:flex sm:items-center sm:justify-between">
      <div class="sm:flex sm:space-x-5">
       <div class="flex-shrink-0 ">
        <div class="flex justify-center items-center">
         <x-svg.user class="h-20" />
        </div>
       </div>
       <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
        <p class="text-sm font-medium text-gray-600">Welcome back,</p>
        <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ auth()->user()->name }}</p>
        <p class="text-sm font-medium text-gray-600">{{ auth()->user()->role->name }}</p>
       </div>
      </div>
      <div class="mt-5 flex justify-center sm:mt-0">
       <a href="{{ route('client.profile') }}"
        class="flex items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">View
        profile</a>
      </div>
     </div>
    </div>
    <div class=" mx-6 mb-2  mt-2">
     @if (auth()->user()->user_information == null)
      <div class="rounded-md bg-yellow-50 p-4">
       <div class="flex">
        <div class="flex-shrink-0">
         <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd"
           d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
           clip-rule="evenodd" />
         </svg>
        </div>
        <div class="ml-3">
         <h3 class="text-sm font-medium text-yellow-800">Attention needed</h3>
         <div class="mt-2 text-sm text-yellow-700">
          <p>To submit an application, please first update your personal information. Just click "View
           Profile". Thank You.</p>
         </div>
        </div>
       </div>
      </div>
     @endif

    </div>
   </div>

  </section>

  <!-- Actions panel -->
  <section aria-labelledby="quick-links-title">
   <div
    class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-gray-200 shadow sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0">
    <h2 class="sr-only" id="quick-links-title">Quick links</h2>

    {{-- <livewire:client.request-document /> --}}
    <div x-on:click="window.location.href='{{ route('client.notarize-document') }}'"
     class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
     <div>
      <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
       <!-- Heroicon name: outline/clock -->
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-600" width="24" height="24">
        <path fill="none" d="M0 0h24v24H0z" />
        <path
         d="M19 22H5a3 3 0 0 1-3-3V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v12h4v4a3 3 0 0 1-3 3zm-1-5v2a1 1 0 0 0 2 0v-2h-2zm-2 3V4H4v15a1 1 0 0 0 1 1h11zM6 7h8v2H6V7zm0 4h8v2H6v-2zm0 4h5v2H6v-2z" />
       </svg>
      </span>
     </div>
     <div class="mt-8">
      <h3 class="text-lg font-medium">
       <a href="#" class="focus:outline-none">
        <!-- Extend touch target to entire panel -->
        <span class="absolute inset-0" aria-hidden="true"></span>
        Request Notarized Document
       </a>
      </h3>
      <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et
       dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
     </div>
     <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400"
      aria-hidden="true">
      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
       <path
        d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
      </svg>
     </span>
    </div>

    <livewire:client.appointment-request />

   </div>
  </section>
 </div>
</x-client-layout>
