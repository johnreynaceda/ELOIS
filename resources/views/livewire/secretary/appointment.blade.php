<div>
  {{-- <x-button label="create event" wire:click="$set('create_modal', true)" /> --}}
  <div class="p-4 bg-gray-100 rounded-xl">
    <div id='calendar'></div>
  </div>
  <x-modal wire:model.defer="create_modal">
    <x-card title="Consent Terms">
      <x-input label="Name" wire:model="name" placeholder="your name" />
      <div class="grid grid-cols-2 gap-4 mt-2">
        <x-datetime-picker label="Appointment Date" placeholder="Appointment Date" without-time
          wire:model.defer="start_date" />
        <x-time-picker label="AM/PM" placeholder="12:00 AM" wire:model.defer="start_time" />
      </div>
      <div class="grid grid-cols-2 gap-4 mt-3">
        <x-datetime-picker label="Appointment Date" placeholder="Appointment Date" without-time
          wire:model.defer="end_date" />
        <x-time-picker label="AM/PM" placeholder="12:00 AM" wire:model.defer="end_time" />
      </div>
      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button primary wire:click="add" label="I Agree" />
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
            '</p><p class="text-sm font-bold text-gray-700"> Lawyer: ' + info.event.extendedProps.lawyer +
            '</p></div></li></div>';
          modal.style.display = 'block';
          var closeButton = document.getElementsByClassName('close')[0];
          closeButton.onclick = function() {
            modal.style.display = 'none';
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
