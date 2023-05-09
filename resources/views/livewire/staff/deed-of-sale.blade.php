<div x-data>
 <div class="border border-gray-600 rounded-lg p-5">
  <div class="grid grid-cols-3 gap-4 ">
   <x-input label="CLient's Complete Name" wire:model.defer="client_name" placeholder="" />
   <x-input label="Address" placeholder="" wire:model.defer="client_address" />
   <x-input label="Amount" suffix="₱" wire:model.defer="amount" placeholder="" />
  </div>
  <div class="mt-3">
   <div class="p-3 rounded-lg bg-gray-100 grid grid-cols-2 gap-4">
    <x-input label="Make" wire:model.defer="make" placeholder="" />
    <x-input label="Model" wire:model.defer="model" placeholder="" />
    <x-input label="Type" wire:model.defer="type" placeholder="" />
    <x-input label="Serial Number" wire:model.defer="serial_number" placeholder="" />
    <x-input label="Motor Number" wire:model.defer="motor_number" placeholder="" />
    <x-input label="Plate Number" placeholder="" wire:model.defer="plate_number" />
    <x-input label="File" placeholder="" wire:model.defer="file" />
   </div>

  </div>
  <div class="mt-3 flex justify-end">
   <x-button label="Print DOS" wire:click="$set('print_modal', true)" icon="printer" dark class="font-medium
      " />
  </div>
 </div>
 <x-modal blur wire:model.defer="print_modal" max-width="5xl" align="center">
  <x-card>
   <div x-data>
    <div x-ref="printContainer">
     <div class="text-center">
      <h2 class="text-xl font-bold uppercase text-gray-700">Deed of Sale of Motor Vehicle</h2>
     </div>
     <div class="mt-3">
      <span>KNOW ALL MEN BY THESE PRESENTS:</span>
      <p class="mt-3 text-justify ">
       That I, <span class="font-bold px-4">{{ $client_name }}</span>, legal age, single, with residence and
       postal
       address
       at <span class="font-bold px-4">{{ $client_address }}</span> for and in consideration of the amount of
       PESOS:
       <span class="font-bold">{{ $amount }}</span> (₱<span class="font-bold">(amount in words)</span>),
       Philippine
       Currency,
       and other valuable consideration, receipt of which is hereby acknowled ged from
       <span>{{ $client_name }}</span>
       likewise of legal age, married, with residence and postal address at <span
        class="font-bold">{{ $client_address }}</span>,
       do hereby SELL, TRANSFER and CONVEYS and by these presents have SOLD, TRANSFERRED AND CONVEYED unto said
       <span class="font-bold">DSFDSFDSF</span>, the following motor vehicle describe as follows:
      </p>
     </div>
     <div class="mt-3">
      <table id="example" class="table-auto " style="width:100%">
       <thead class="font-normal">
        <tr>
         <th class="text-left whitespace-nowrap px-2 text-sm font-medium text-gray-500 py-2">
         </th>
         <th class="text-left whitespace-nowrap px-2 text-sm font-medium text-gray-500 py-2"></th>
        </tr>
       </thead>
       <tbody class="">

        <tr>
         <td class="border border-gray-600 text-gray-600  px-3 whitespace-nowrap py-1">Make: {{ $make }}
         </td>
         <td class="border border-gray-600 text-gray-600  px-3 whitespace-nowrap py-1">Serial No.:
          {{ $serial_number }}</td>
        </tr>
        <tr>
         <td class="border border-gray-600 text-gray-600  px-3 whitespace-nowrap py-1">Model: {{ $model }}
         </td>
         <td class="border border-gray-600 text-gray-600  px-3 whitespace-nowrap py-1">Motor No.:
          {{ $motor_number }}</td>
        </tr>
        <tr>
         <td class="border border-gray-600 text-gray-600  px-3 whitespace-nowrap py-1">Type: {{ $type }}
         </td>
         <td class="border border-gray-600 text-gray-600  px-3 whitespace-nowrap py-1">Plate No.:
          {{ $plate_number }}</td>
        </tr>
        <tr>
         <td class="border border-gray-600 text-gray-600  px-3 whitespace-nowrap py-1"></td>
         <td class="border border-gray-600 text-gray-600  px-3 whitespace-nowrap py-1">File: {{ $file }}
         </td>
        </tr>
       </tbody>
      </table>
      <p class="mt-2">
       of which I am the absolute owner.
      </p>
      <p class="mt-3 text-justify">
       I hereby warrant the said motor vehicle is free from any liens and encumbrances and that I will defend the
       title rights of the VENDEE from any claims of whatever kind or nature from third persons.
      </p>
      <p class="mt-3 text-justify">
       IN WITNESS WHEREOF, I have hereunder affixed my hand this
       {{ date('jS \d\a\y \o\f F, Y', strtotime(now())) }}
       at Sta. Rosa, Laguna Philippines.
      </p>
      <div class="mt-3 px-4 flex justify-between">
       <span>Vendee</span>
       <span>Vendor</span>
      </div>
      <div class="mt-3 px-4 flex justify-between items-center">
       <div>
        <span>SIGNED IN THE PRESENCE OF:</span>
        <div class="mt-4">
         ____________________
        </div>
       </div>
       <div>
        <span></span>
        <div class="mt-4">
         ____________________
        </div>
       </div>
      </div>
      <div class="mt-4">
       <h1>REPUBLIC OF THE PHILIPPINES</h1>
       <h1>PROVINCE OF SULTAN KUDARAT</h1>
       <h1>CITY/MUNICIPALITY OF ISULAN</h1>
      </div>
      <p class="mt-3 text-justify">Before me, Notary Public, for and in the City/Municipality of Isulan Sultan
       Kudarat
       appeared
       <span class="font-bold">{{ $client_name }}</span> known to me and to me known to be the same persons who
       executed the foregoing instrument and
       acknowledged to me that the same is her/his free and voluntary act and deed.
      </p>
      <p class="mt-2">WITNESS MY HAND AND SEAL, this {{ date('jS \d\a\y \o\f F, Y', strtotime(now())) }}</p>
      <div class="mt-3  flex  flex-col space-y-3 justify-between">
       <span>Doc. No.</span>
       <span>Page No.</span>
       <span>Book No.</span>
       <span>Series of</span>
      </div>

     </div>
    </div>
    <div class="mt-2 flex justify-end">
     <x-button @click="printOut($refs.printContainer.outerHTML);" label="Print" dark icon="printer"
      class="font-medium" />
    </div>
   </div>

  </x-card>
 </x-modal>
</div>
