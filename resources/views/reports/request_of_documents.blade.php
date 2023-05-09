<div>
  <div class="mt-10">
    <h1 class="text-center text-xl font-bold">REQUEST OF DOCUMENTS</h1>
  </div>
  <div class="mt-5">
    <table id="example" class="table-auto" style="width:100%">
      <thead class="font-normal">
        <tr>
          <th class="border text-left px-2 text-sm font-medium text-gray-600 py-2">CLIENT FULLNAME
          </th>
          <th class="border text-left px-2 text-sm font-medium text-gray-600 py-2">ADDRESS</th>
          <th class="border text-left px-2 text-sm font-medium text-gray-600 py-2">NOTES
          </th>
          <th class="border text-left px-2 text-sm font-medium text-gray-600 py-2">REQUESTED DATE</th>
        </tr>
      </thead>
      <tbody class="">

        @foreach ($requests as $request)
          <tr>
            <td class="border text-gray-600  px-3 py-1">
              {{ $request->user->user_information->firstname . ' ' . $request->user->user_information->lastname }}</td>
            <td class="border text-gray-600  px-3 py-1">
              {{ $request->user->user_information->address }}
            </td>
            <td class="border text-gray-600  px-3 py-1">
              {{ $request->notes }}
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
