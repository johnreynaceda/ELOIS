<div>
  <div class="py-2">
    <x-button label="Add New Event" positive right-icon="calendar" wire:click="$set('add_modal', true)"
      spinner="$set('add_modal', true) " />
  </div>
  <div class="p-4 bg-gray-100 rounded-xl">
    <div id='calendar'></div>
  </div>

  <x-modal wire:model.defer="add_modal" align="center">
    <x-card title="New Event">
      <div class="flex flex-col space-y-2">
        <x-input label="Name" wire:model.defer="title" placeholder="your name" />
        <x-textarea label="Description" wire:model.defer="description" placeholder="write your description" />
        <div class="grid grid-cols-2 gap-4 ">
          <x-datetime-picker label="Start Date" placeholder="Start Date" without-time wire:model.defer="start_date" />
          <x-time-picker label="AM/PM" placeholder="12:00 AM" wire:model.defer="start_time" />
          <x-datetime-picker label="End Date" placeholder="End Date" without-time wire:model.defer="end_date" />
          <x-time-picker label="AM/PM" placeholder="12:00 AM" wire:model.defer="end_time" />
        </div>
      </div>
      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button positive right-icon="save-as" label="Add Event" wire:click="addEvent" spinner="addEvent" />
        </div>

      </x-slot>

    </x-card>
  </x-modal>
</div>
<div class="modal" id="myModal">
  <div class="modal-content">
    <div class="flex justify-between items-center">
      <h2 class="text-center" id="modalTitle"></h2>
      <span class="close">&times;</span>

    </div>
    <p id="modalBody"></p>

  </div>
</div>
@push('scripts')
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
      transition: opacity 0.5s;
    }

    .modal.fade {
      opacity: 0;
      pointer-events: none;
    }

    .modal-content {
      background-color: #fefefe;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 20%;
      border-radius: 8px;
      line-height: 1.5;
    }

    .modal-content p {
      margin-bottom: 5px;
      margin-top: 5px;
    }

    .fc-event {
      cursor: pointer;
      text-align: center;
    }

    #calendar .fc-button {
      background-color: #0a5200;
      border-color: #0a5200;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        views: {
          timeGridWeek: {
            type: 'timeGrid',
            duration: {
              days: 7
            },
            buttonText: 'week'
          }
        },
        headerToolbar: {
          start: 'prev next',
          center: 'title',
          end: 'today timeGridWeek dayGridMonth'
        },
        displayEventTime: false,
        eventColor: '#0a5200',
        events: {!! json_encode($events) !!},
        eventClick: function(info) {
          // Display additional information in a modal-like dialog
          var modal = document.getElementById('myModal');
          var modalTitle = document.getElementById('modalTitle');
          var modalBody = document.getElementById('modalBody');
          const options = {
            month: 'long',
            day: 'numeric',
            year: 'numeric'
          };
          const formattedDateFrom = info.event.start.toLocaleString('en-US', options);
          const formattedDateTo = info.event.end.toLocaleString('en-US', options);
          modalTitle.innerHTML = 'APPOINTMENTS DETAILS';
          modalBody.innerHTML =
            '<div class="bg-primary-100 mt-3 p-3 rounded-md"><li class="flex py-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" class="fill-green-700" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zM4 9v10h16V9H4zm2 2h2v2H6v-2zm0 4h2v2H6v-2zm4-4h8v2h-8v-2zm0 4h5v2h-5v-2z"/></svg><div class="ml-3"><p class="font-bold uppercase text-gray-700">' +
            info.event.extendedProps.name +
            '</p><p class="text-xs text-gray-500">' + info.event.extendedProps.description +
            '</p><p class="text-xs text-gray-500">' + info.event.extendedProps.other +
            '</p></div></li> <div class="mt-2"><button id="delete" type="button" class="rounded flex space-x-1 items-center bg-red-600 py-1 px-2 text-xs text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="myFunction()"><svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg><span>Delete Event</span></button></div></div>';
          modal.style.display = 'block';
          var closeButton = document.getElementsByClassName('close')[0];
          closeButton.onclick = function() {
            modal.style.display = 'none';
          }

          var deleteButton = document.getElementById('delete');

          deleteButton.onclick = function() {
            modal.style.display = 'none';
            Livewire.emit('deleteEvent', info.event.extendedProps.event_id);
          }



          document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
              modal.style.display = 'none';
            }


          });



        }

      });
      calendar.render();



    });
  </script>
@endpush
