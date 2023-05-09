<div>



  <ul role="list" class="divide-y divide-gray-200" x-animate>
    <header class="text-xl">
      Onqueue Requests
    </header>
    @forelse ($requests as $item)
      <li class="relative bg-white py-3 px-4  hover:bg-gray-50" x-animate>
        <div class="flex justify-between space-x-3">
          <div class="min-w-0 flex-1">
            <a href="{{ route('staff.manage-client', ['id' => $item->user->id]) }}" class="block focus:outline-none">
              <span class="absolute inset-0" aria-hidden="true"></span>
              <p class="truncate text-sm font-medium text-gray-900">
                {{ $item->user->user_information->firstname . ' ' . $item->user->user_information->lastname }}</p>
              <p class="truncate text-sm text-green-500">Request is on queue</p>
            </a>
          </div>
          <time datetime="2021-01-27T16:35"
            class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</time>
        </div>
      </li>
    @empty
      <li class="relative bg-white py-3 px-4  hover:bg-gray-50" x-animate>
        <div class="flex justify-between space-x-3">
          <div class="min-w-0 flex-1">
            <a href="#" class="block focus:outline-none">
              <span class="absolute inset-0" aria-hidden="true"></span>
              <p class="truncate text-sm font-medium text-gray-900">
                No request yet</p>
            </a>
          </div>
        </div>
      </li>
    @endforelse

    <!-- More messages... -->
  </ul>

</div>
