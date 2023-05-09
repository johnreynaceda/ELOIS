<div>
  <div class="mt-10">
    <h1 class="text-center text-xl font-bold">APPOINTMENT LISTS</h1>
  </div>
  <div class="mt-5">
    <table id="example" class="table-auto" style="width:100%">
      <thead class="font-normal">
        <tr>
          <th class="border text-left px-2 text-sm font-medium text-gray-600 py-2">CLIENT FULLNAME
          </th>
          <th class="border text-left px-2 text-sm font-medium text-gray-600 py-2">LAWYER NAME</th>
          <th class="border text-left px-2 text-sm font-medium text-gray-600 py-2">REQUEST TITLE
          </th>
          <th class="border text-left px-2 text-sm font-medium text-gray-600 py-2">REQUESTED DATE</th>
        </tr>
      </thead>
      <tbody class="">

        @foreach ($appointments as $request)
          <tr>
            <td class="border text-gray-600  px-3 py-1">
              {{ $request->user->user_information->firstname . ' ' . $request->user->user_information->lastname }}</td>
            <td class="border text-gray-600  px-3 py-1">
              {{ $request->lawyer->firstname . ' ' . $request->lawyer->lastname }}
            </td>
            <td class="border text-gray-600  px-3 py-1">
              {{ $request->name }}
            </td>
            <td class="border text-gray-600  px-3 py-1">
              {{ \Carbon\Carbon::parse($request->updated_at)->format('F d, Y') }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
