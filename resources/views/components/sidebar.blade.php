<div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col" x-data="{ logout }">
  <!-- Sidebar component, swap this element with another sidebar if you like -->
  <div class="flex min-h-0 flex-1 flex-col border-r border-gray-200 bg-sidebar">
    <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
      <div class="flex flex-shrink-0 items-center px-4">
        {{-- <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
            alt="Your Company"> --}}
        <div class="grid w-full place-content-center">
          <svg width="128" height="24" viewBox="0 0 128 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_11_1979)">
              <path
                d="M11.5 3.278V2.5H12.5V3.278V3.63829L12.8418 3.7523L17.8418 5.4203L17.9999 5.47305L18.1581 5.42037L21.316 4.3683L21.6324 5.31589L19.0749 6.16867L18.5876 6.33116L18.7631 6.81391L21.7494 15.0243C20.7664 15.9402 19.448 16.5 18 16.5C16.5512 16.5 15.2335 15.9402 14.2505 15.0243L17.2349 6.81381L17.4104 6.3312L16.9232 6.1687L13.1582 4.9127L12.5 4.69311V5.387V19V19.5H13H16.5V20.5H7.50002V19.5H11H11.5V19V5.387V4.69329L10.8419 4.91266L7.07391 6.16866L6.58653 6.33112L6.76214 6.81391L9.74849 15.0245C8.76637 15.9402 7.44799 16.5 6.00002 16.5C4.55117 16.5 3.23347 15.9402 2.25054 15.0243L5.23494 6.81381L5.4104 6.33108L4.92313 6.16866L2.36755 5.3168L2.6842 4.36735L5.84198 5.41937L6.00008 5.47204L6.15816 5.41933L11.1582 3.75233L11.5 3.63836V3.278ZM18.4699 8.93214L18.0002 7.64028L17.5302 8.93203L16.1122 12.829L15.868 13.5H16.582H19.417H20.1309L19.8869 12.8291L18.4699 8.93214ZM6.46992 8.93214L6.00019 7.64029L5.53016 8.93203L4.11216 12.829L3.86801 13.5H4.58202H7.41702H8.13085L7.88692 12.8291L6.46992 8.93214Z"
                fill="#00ABB3" stroke="#3C4048" />
            </g>
            <path
              d="M34.675 21.25C32.5917 21.25 30.9333 20.7167 29.7 19.65C28.4833 18.5667 27.8583 16.9167 27.825 14.7C27.825 14.6333 27.825 14.55 27.825 14.45C27.825 14.3333 27.825 14.25 27.825 14.2C27.875 12.8167 28.175 11.65 28.725 10.7C29.2917 9.73333 30.075 9 31.075 8.5C32.0917 8 33.2833 7.75 34.65 7.75C36.1833 7.75 37.45 8.05833 38.45 8.675C39.4667 9.275 40.225 10.0833 40.725 11.1C41.225 12.1 41.475 13.225 41.475 14.475V15.175C41.475 15.3417 41.4083 15.4917 41.275 15.625C41.1417 15.7583 40.9833 15.825 40.8 15.825H33.1C33.1 15.825 33.1 15.8417 33.1 15.875C33.1 15.9083 33.1 15.9417 33.1 15.975C33.1 16.375 33.15 16.7333 33.25 17.05C33.3667 17.35 33.5417 17.5917 33.775 17.775C34.0083 17.9417 34.2917 18.025 34.625 18.025C34.8417 18.025 35.025 17.9917 35.175 17.925C35.325 17.8583 35.45 17.775 35.55 17.675C35.6667 17.5583 35.7667 17.45 35.85 17.35C36 17.2 36.125 17.1083 36.225 17.075C36.325 17.025 36.475 17 36.675 17H40.6C40.75 17 40.875 17.05 40.975 17.15C41.0917 17.25 41.1417 17.375 41.125 17.525C41.1083 17.825 40.9667 18.1917 40.7 18.625C40.4333 19.0417 40.0333 19.45 39.5 19.85C38.9833 20.25 38.3167 20.5833 37.5 20.85C36.6833 21.1167 35.7417 21.25 34.675 21.25ZM33.1 13.025H36.2V12.975C36.2 12.525 36.1417 12.1417 36.025 11.825C35.9083 11.5083 35.7333 11.275 35.5 11.125C35.2667 10.9583 34.9833 10.875 34.65 10.875C34.3167 10.875 34.0333 10.9583 33.8 11.125C33.5667 11.275 33.3917 11.5083 33.275 11.825C33.1583 12.1417 33.1 12.525 33.1 12.975V13.025ZM44.1594 15.625C43.976 15.625 43.8177 15.5667 43.6844 15.45C43.5677 15.3167 43.5094 15.1583 43.5094 14.975V12.025C43.5094 11.8417 43.5677 11.6917 43.6844 11.575C43.8177 11.4417 43.976 11.375 44.1594 11.375H52.1594C52.3427 11.375 52.4927 11.4417 52.6094 11.575C52.7427 11.6917 52.8094 11.8417 52.8094 12.025V14.975C52.8094 15.1583 52.7427 15.3167 52.6094 15.45C52.4927 15.5667 52.3427 15.625 52.1594 15.625H44.1594ZM56.2264 21C56.0597 21 55.9097 20.9417 55.7764 20.825C55.643 20.6917 55.5764 20.5333 55.5764 20.35V4.15C55.5764 3.96667 55.643 3.81667 55.7764 3.7C55.9097 3.56667 56.0597 3.5 56.2264 3.5H60.3764C60.5597 3.5 60.718 3.56667 60.8514 3.7C60.9847 3.81667 61.0514 3.96667 61.0514 4.15V16.55H68.2764C68.4597 16.55 68.618 16.6167 68.7514 16.75C68.8847 16.8667 68.9514 17.0167 68.9514 17.2V20.35C68.9514 20.5333 68.8847 20.6917 68.7514 20.825C68.618 20.9417 68.4597 21 68.2764 21H56.2264ZM78.2143 21.25C76.6143 21.25 75.2226 21 74.0393 20.5C72.8726 20 71.9476 19.25 71.2643 18.25C70.5976 17.2333 70.2393 15.975 70.1893 14.475C70.1726 13.775 70.1643 13.0583 70.1643 12.325C70.1643 11.575 70.1726 10.8333 70.1893 10.1C70.2393 8.61667 70.5976 7.36667 71.2643 6.35C71.9476 5.33333 72.8809 4.56667 74.0643 4.05C75.2476 3.51667 76.6309 3.25 78.2143 3.25C79.7809 3.25 81.1559 3.51667 82.3393 4.05C83.5226 4.56667 84.4559 5.33333 85.1393 6.35C85.8226 7.36667 86.1809 8.61667 86.2143 10.1C86.2476 10.8333 86.2643 11.575 86.2643 12.325C86.2643 13.0583 86.2476 13.775 86.2143 14.475C86.1643 15.975 85.7976 17.2333 85.1143 18.25C84.4476 19.25 83.5226 20 82.3393 20.5C81.1726 21 79.7976 21.25 78.2143 21.25ZM78.2143 17C78.9143 17 79.4893 16.7917 79.9393 16.375C80.3893 15.9417 80.6226 15.2583 80.6393 14.325C80.6726 13.6083 80.6893 12.9167 80.6893 12.25C80.6893 11.5667 80.6726 10.875 80.6393 10.175C80.6226 9.55833 80.5059 9.05 80.2893 8.65C80.0893 8.25 79.8059 7.95833 79.4393 7.775C79.0893 7.59167 78.6809 7.5 78.2143 7.5C77.7476 7.5 77.3309 7.59167 76.9643 7.775C76.5976 7.95833 76.3059 8.25 76.0893 8.65C75.8893 9.05 75.7809 9.55833 75.7643 10.175C75.7476 10.875 75.7393 11.5667 75.7393 12.25C75.7393 12.9167 75.7476 13.6083 75.7643 14.325C75.7976 15.2583 76.0309 15.9417 76.4643 16.375C76.9143 16.7917 77.4976 17 78.2143 17ZM89.4783 21C89.3117 21 89.1617 20.9417 89.0283 20.825C88.895 20.6917 88.8283 20.5333 88.8283 20.35V4.15C88.8283 3.96667 88.895 3.81667 89.0283 3.7C89.1617 3.56667 89.3117 3.5 89.4783 3.5H93.7283C93.9117 3.5 94.0617 3.56667 94.1783 3.7C94.3117 3.81667 94.3783 3.96667 94.3783 4.15V20.35C94.3783 20.5333 94.3117 20.6917 94.1783 20.825C94.0617 20.9417 93.9117 21 93.7283 21H89.4783ZM104.396 21.25C102.646 21.25 101.188 21.0083 100.021 20.525C98.8709 20.025 98.0042 19.3833 97.4209 18.6C96.8542 17.8 96.5542 16.9583 96.5209 16.075C96.5209 15.925 96.5709 15.8 96.6709 15.7C96.7709 15.6 96.8959 15.55 97.0459 15.55H101.021C101.254 15.55 101.438 15.5917 101.571 15.675C101.704 15.7417 101.846 15.8417 101.996 15.975C102.146 16.1583 102.321 16.3333 102.521 16.5C102.721 16.65 102.979 16.775 103.296 16.875C103.613 16.9583 103.979 17 104.396 17C105.163 17 105.754 16.9 106.171 16.7C106.588 16.4833 106.796 16.1917 106.796 15.825C106.796 15.5417 106.679 15.3083 106.446 15.125C106.229 14.9417 105.854 14.775 105.321 14.625C104.788 14.475 104.063 14.3167 103.146 14.15C101.863 13.9333 100.754 13.6167 99.8209 13.2C98.8876 12.7667 98.1709 12.1917 97.6709 11.475C97.1876 10.7417 96.9459 9.84167 96.9459 8.775C96.9459 7.69167 97.2459 6.73333 97.8459 5.9C98.4626 5.06667 99.3126 4.41667 100.396 3.95C101.496 3.48333 102.771 3.25 104.221 3.25C105.421 3.25 106.479 3.40833 107.396 3.725C108.329 4.04167 109.113 4.45833 109.746 4.975C110.379 5.475 110.863 6.01667 111.196 6.6C111.529 7.18333 111.704 7.74167 111.721 8.275C111.721 8.425 111.663 8.55833 111.546 8.675C111.446 8.775 111.329 8.825 111.196 8.825H107.021C106.821 8.825 106.646 8.79167 106.496 8.725C106.363 8.65833 106.238 8.55 106.121 8.4C106.038 8.16667 105.829 7.95833 105.496 7.775C105.163 7.59167 104.738 7.5 104.221 7.5C103.654 7.5 103.221 7.6 102.921 7.8C102.621 7.98333 102.471 8.25833 102.471 8.625C102.471 8.875 102.563 9.09167 102.746 9.275C102.929 9.45833 103.254 9.625 103.721 9.775C104.188 9.90833 104.838 10.0583 105.671 10.225C107.254 10.4583 108.529 10.7917 109.496 11.225C110.479 11.6583 111.196 12.225 111.646 12.925C112.096 13.625 112.321 14.5 112.321 15.55C112.321 16.7333 111.979 17.75 111.296 18.6C110.613 19.45 109.671 20.1083 108.471 20.575C107.288 21.025 105.929 21.25 104.396 21.25Z"
              fill="#3C4048" />
            <defs>
              <clipPath id="clip0_11_1979">
                <rect width="24" height="24" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </div>
      </div>
      <div class="my-5 mt-10">
        <div class="flex flex-1 items-center flex-col">
          <div class="bg-gradient-to-tr from-white via-sky-200 to-sky-400 p-1 shadow-md rounded-full">
            <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full"
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
              alt="">
          </div>
          <h3 class="mt-3 text-sm font-bold uppercase text-gray-700">Jane Cooper</h3>
          <dl class="mt-1 flex flex-grow flex-col justify-between">
            <dt class="sr-only">Title</dt>
            <dd class="text-sm text-gray-600">Paradigm Representative</dd>
            <dt class="sr-only">Role</dt>
          </dl>
        </div>
      </div>
      <nav class="mt-2 flex-1 space-y-1 bg-sidebar px-2">
        <a
          class="
          text-gray-600 hover:bg-gray-50 hover:text-gray-600 group flex items-center px-2 py-1.5 text-sm font-medium
          rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="fill-gray-600 group-hover:fill-gray-500 mr-2 flex-shrink-0 h-6 w-6">
            <path fill="none" d="M0 0H24V24H0z" />
            <path
              d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2zm4.596 5.404c-.204-.205-.526-.233-.763-.067-2.89 2.028-4.52 3.23-4.894 3.602-.585.586-.585 1.536 0 2.122.586.585 1.536.585 2.122 0 .219-.22 1.418-1.851 3.598-4.897.168-.234.141-.556-.063-.76zM17.5 11c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1zm-11 0c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1zm2.318-3.596c-.39-.39-1.024-.39-1.414 0-.39.39-.39 1.023 0 1.414.39.39 1.023.39 1.414 0 .39-.39.39-1.024 0-1.414zM12 5.5c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1z" />
          </svg>
          <span>DASHBOARD</span>
        </a>
        <a href=""
          class=" text-gray-600 hover:bg-gray-50 hover:text-gray-600 group flex items-center px-2 py-1.5 text-sm font-medium rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="fill-gray-600 group-hover:fill-gray-500 mr-2 flex-shrink-0 h-6 w-6">
            <path fill="none" d="M0 0h24v24H0z" />
            <path
              d="M8 21V11h14v9a1 1 0 0 1-1 1H8zm-2 0H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2H21a1 1 0 0 1 1 1v3H7a1 1 0 0 0-1 1v11z" />
          </svg>
          <span>DOCUMENTS</span>
        </a>
        <a href=""
          class=" text-gray-600 hover:bg-gray-50 hover:text-gray-600 group flex items-center px-2 py-1.5 text-sm font-medium rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="fill-gray-600 group-hover:fill-gray-500 mr-2 flex-shrink-0 h-6 w-6">
            <path fill="none" d="M0 0h24v24H0z" />
            <path
              d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zM4 9v10h16V9H4zm2 2h2v2H6v-2zm0 4h2v2H6v-2zm4-4h8v2h-8v-2zm0 4h5v2h-5v-2z" />
          </svg>
          <span>APPOINTMENTS</span>
        </a>
        <a href=""
          class=" text-gray-600 hover:bg-gray-50 hover:text-gray-600 group flex items-center px-2 py-1.5 text-sm font-medium rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="fill-gray-600 group-hover:fill-gray-500 mr-2 flex-shrink-0 h-6 w-6">
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M5 20h14v2H5v-2zm7-2a8 8 0 1 1 0-16 8 8 0 0 1 0 16z" />
          </svg>
          <span>USERS</span>
        </a>
        <a href=""
          class=" text-gray-600 hover:bg-gray-50 hover:text-gray-600 group flex items-center px-2 py-1.5 text-sm font-medium rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="fill-gray-600 group-hover:fill-gray-500 mr-2 flex-shrink-0 h-6 w-6">
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M5 20h14v2H5v-2zm7-2a8 8 0 1 1 0-16 8 8 0 0 1 0 16z" />
          </svg>
          <span>CLIENTS</span>
        </a>
        <a href="#"
          class="text-gray-600 hover:bg-gray-50 hover:text-gray-600 group flex items-center px-2 py-1.5 text-sm font-medium rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            class="fill-gray-600 group-hover:fill-gray-500 mr-2 flex-shrink-0 h-6 w-6">
            <path fill="none" d="M0 0h24v24H0z" />
            <path
              d="M12.414 5H21a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2zM11 9v8h2V9h-2zm4 3v5h2v-5h-2zm-8 2v3h2v-3H7z" />
          </svg>
          <span>REPORTS</span>
        </a>
      </nav>
    </div>
    <div class="flex flex-shrink-0 justify-center space-x-2 border-t border-gray-500 p-4">
      {{-- <x-button white>
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <g>
            <path fill="none" d="M0 0h24v24H0z"></path>
            <path
              d="M2.132 13.63a9.942 9.942 0 0 1 0-3.26c1.102.026 2.092-.502 2.477-1.431.385-.93.058-2.004-.74-2.763a9.942 9.942 0 0 1 2.306-2.307c.76.798 1.834 1.125 2.764.74.93-.385 1.457-1.376 1.43-2.477a9.942 9.942 0 0 1 3.262 0c-.027 1.102.501 2.092 1.43 2.477.93.385 2.004.058 2.763-.74a9.942 9.942 0 0 1 2.307 2.306c-.798.76-1.125 1.834-.74 2.764.385.93 1.376 1.457 2.477 1.43a9.942 9.942 0 0 1 0 3.262c-1.102-.027-2.092.501-2.477 1.43-.385.93-.058 2.004.74 2.763a9.942 9.942 0 0 1-2.306 2.307c-.76-.798-1.834-1.125-2.764-.74-.93.385-1.457 1.376-1.43 2.477a9.942 9.942 0 0 1-3.262 0c.027-1.102-.501-2.092-1.43-2.477-.93-.385-2.004-.058-2.763.74a9.942 9.942 0 0 1-2.307-2.306c.798-.76 1.125-1.834.74-2.764-.385-.93-1.376-1.457-2.477-1.43zM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
            </path>
          </g>
        </svg>
      </x-button>
      <x-button dark @click="logout = true">
        <svg class="w-5 h-5" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M6 3a3 3 0 00-3 3v12a3 3 0 003 3h4a3 3 0 003-3v-5h4.586l-2.293 2.293a1 1 0 001.414 1.414l4-4a1 1 0 000-1.414l-4-4a1 1 0 10-1.414 1.414L17.586 11H13V6a3 3 0 00-3-3H6zm7 8H8a1 1 0 100 2h5v-2z"
            fill="currentColor"></path>
        </svg>
      </x-button> --}}

    </div>
  </div>


  <div x-show="logout" x-cloak class="relative" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div x-show="logout" x-cloak x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div x-show="logout" x-cloak class="fixed inset-0">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div x-transition:enter="transition ease-out duration-300"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave="transition ease-in duration-200"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
          <div>
            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-500">
              <!-- Heroicon name: outline/check -->
              <svg class="w-64 h-64 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="none">
                <path
                  d="M14.5 19C16.9853 19 19 16.9853 19 14.5C19 12.0147 16.9853 10 14.5 10C12.0147 10 10 12.0147 10 14.5C10 16.9853 12.0147 19 14.5 19ZM15.1244 17.0049C15.1244 17.3498 14.8448 17.6294 14.4999 17.6294C14.155 17.6294 13.8754 17.3498 13.8754 17.0049C13.8754 16.66 14.155 16.3804 14.4999 16.3804C14.8448 16.3804 15.1244 16.66 15.1244 17.0049ZM16.3534 13.4529C16.3534 14.0387 16.139 14.3607 15.6257 14.7715L15.3487 14.9858C15.103 15.1804 15.0202 15.2863 15.0034 15.4341L14.9919 15.5902C14.9495 15.8234 14.7454 16.0003 14.4999 16.0003C14.2238 16.0003 13.9999 15.7764 13.9999 15.5003C14 14.9294 14.2099 14.6161 14.7157 14.2118L14.9937 13.9968C15.2822 13.7679 15.3534 13.6547 15.3534 13.4529C15.3534 12.8953 14.9723 12.5034 14.5 12.5034C14.0062 12.5034 13.641 12.8691 13.6465 13.4481C13.6492 13.7243 13.4275 13.9503 13.1514 13.9529C12.8752 13.9556 12.6492 13.7339 12.6466 13.4577C12.6357 12.3208 13.452 11.5034 14.5 11.5034C15.531 11.5034 16.3534 12.3492 16.3534 13.4529ZM9 2C6.79086 2 5 3.79086 5 6C5 8.20914 6.79086 10 9 10C11.2091 10 13 8.20914 13 6C13 3.79086 11.2091 2 9 2ZM4.00873 11C2.90315 11 2 11.8869 2 13C2 14.6912 2.83281 15.9663 4.13499 16.7966C5.41697 17.614 7.14526 18 9 18C9.41085 18 9.8155 17.9811 10.2105 17.9427C9.45316 17.0003 9 15.8031 9 14.5C9 13.1704 9.47182 11.9509 10.2572 11L4.00873 11Z"
                  fill="currentColor"></path>
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Logout Account</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">Are yous sure you want to logout?</p>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6 flex space-x-2 justify-center">
            <form method="POST" action="{{ route('logout') }}" role="none">
              @csrf
              {{-- <x-button @click="logout=false" label="Cancel" sm />
              <x-button href="{{ route('logout') }}"
                onclick="event.preventDefault();
  this.closest('form').submit();" label="Logout" sm negative /> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>


<!--
      Background backdrop, show/hide based on modal state.
  
      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->

<!--
          Modal panel, show/hide based on modal state.
  
          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
