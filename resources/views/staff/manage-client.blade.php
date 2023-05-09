<x-staff-layout>
 <header>
  <h2 class="text-2xl font-bold uppercase text-gray-700">CLIENTS</h2>
 </header>
 <div class="flex  p-10 gap-10">
  <div class="flex-1">
   <livewire:staff.manage-client />
  </div>
  <div class="w-72">
   <livewire:staff.client-request />
  </div>
 </div>
 <script>
  function printOut(data) {
   var mywindow = window.open('', '', 'height=1000,width=1000');
   mywindow.document.write('<html><head>');
   mywindow.document.write('<title></title>');
   mywindow.document.write(`<link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />`);
   mywindow.document.write('</head><body >');
   mywindow.document.write(data);
   mywindow.document.write('</body></html>');
   mywindow.document.close();
   mywindow.focus();
   setTimeout(() => {
    mywindow.print();
    return true;
   }, 1000);
  }
 </script>
</x-staff-layout>
