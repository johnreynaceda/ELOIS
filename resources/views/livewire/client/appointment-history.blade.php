<div>
  <ul role="list" class="divide-y divide-gray-200">
    @forelse ($lawyer_appointments as $item)
      <li
        class="relative bg-white py-2 px-4 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 hover:bg-gray-50">
        <div class="flex justify-between space-x-3">
          <div class="min-w-0 flex-1">
            <a href="#" class="block focus:outline-none">
              <span class="absolute inset-0" aria-hidden="true"></span>
              <p class="truncate text-sm font-medium text-gray-900">{{ $item->user->name }}</p>
              <p class="truncate text-sm text-gray-500">Request Appointment</p>
            </a>
          </div>
          <time datetime="2021-01-27T16:35"
            class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</time>
        </div>
      </li>
    @empty
      <li
        class="relative bg-white py-2 px-4 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 hover:bg-gray-50">
        <div class="flex justify-between space-x-3">
          <div class="min-w-0 flex-1">
            <a href="#" class="block focus:outline-none">
              <span class="absolute inset-0" aria-hidden="true"></span>
              <p class="truncate text-center text-sm font-medium text-gray-900">No Data</p>
            </a>
          </div>
        </div>
      </li>
    @endforelse

    <!-- More messages... -->
  </ul>
</div>
