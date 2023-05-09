<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="csrf-token" content="{{ csrf_token() }}">

 <title>E-LOIS : LAW OFFICE INFORMATION SYSTEM</title>

 <!-- Fonts -->
 <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
 <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <style>
  /* width */
  ::-webkit-scrollbar {
   width: 5px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
   background: #f1f1f1;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
   background: #888;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
   background: #555;
  }

  [x-cloak] {
   display: none !important;
  }
 </style>
 <!-- Scripts -->
 @wireUiScripts
 @vite(['resources/css/app.css', 'resources/js/app.js'])

 <!-- Styles -->
 @livewireStyles
</head>

<body class="font-rubik antialiased h-full" x-data="{ logout: false }">

 <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
 <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
 <div class="min-h-full">
  <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
  <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
   <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
   <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

   <div class="fixed inset-0 z-40 flex">
    <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
    <div class="relative flex w-full max-w-xs flex-1 flex-col bg-white pt-5 pb-4">
     <!--
          Close button, show/hide based on off-canvas menu state.

          Entering: "ease-in-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
     <div class="absolute top-0 right-0 -mr-12 pt-2">
      <button type="button"
       class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
       <span class="sr-only">Close sidebar</span>
       <!-- Heroicon name: outline/x-mark -->
       <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
       </svg>
      </button>
     </div>

     <div class="flex flex-shrink-0 items-center px-4">
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
     </div>
     <div class="mt-5 h-0 flex-1 overflow-y-auto">
      <nav class="px-2">
       <div class="space-y-1">
        <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:text-gray-900 hover:bg-gray-50" -->
        <a href="#"
         class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md"
         aria-current="page">
         <!--
                  Heroicon name: outline/home

                  Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                -->
         <svg class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
           d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
         </svg>
         Home
        </a>

        <a href="#"
         class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
         <!-- Heroicon name: outline/bars-4 -->
         <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round"
           d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
         </svg>
         My tasks
        </a>

        <a href="#"
         class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
         <!-- Heroicon name: outline/clock -->
         <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"
          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
         </svg>
         Recent
        </a>
       </div>
       <div class="mt-8">
        <h3 class="px-3 text-sm font-medium text-gray-500" id="mobile-teams-headline">Teams</h3>
        <div class="mt-1 space-y-1" role="group" aria-labelledby="mobile-teams-headline">
         <a href="#"
          class="group flex items-center rounded-md px-3 py-2 text-base font-medium leading-5 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
          <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
          <span class="truncate">Engineering</span>
         </a>

         <a href="#"
          class="group flex items-center rounded-md px-3 py-2 text-base font-medium leading-5 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
          <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
          <span class="truncate">Human Resources</span>
         </a>

         <a href="#"
          class="group flex items-center rounded-md px-3 py-2 text-base font-medium leading-5 text-gray-600 hover:bg-gray-50 hover:text-gray-900">
          <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
          <span class="truncate">Customer Success</span>
         </a>
        </div>
       </div>
      </nav>
     </div>
    </div>

    <div class="w-14 flex-shrink-0" aria-hidden="true">
     <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
   </div>
  </div>

  <!-- Static sidebar for desktop -->
  <div
   class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col lg:border-r lg:border-gray-200 lg:bg-gray-300 lg:pt-5 lg:pb-4">
   <div class="flex flex-shrink-0 items-center px-6">
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
   </div>
   <!-- Sidebar component, swap this element with another sidebar if you like -->
   <div class="mt-5 flex h-0 flex-1 flex-col overflow-y-auto pt-1">
    <!-- User account dropdown -->
    <div class="relative inline-block px-3 text-left" x-data="{ userdropdown: false }">
     <div>
      <button type="button" x-on:click="userdropdown = !userdropdown" x-on:click.away="userdropdown = false"
       class="group w-full rounded-md bg-gray-200 px-3.5 py-3 text-left text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-100"
       id="options-menu-button" aria-expanded="false" aria-haspopup="true">
       <span class="flex w-full items-center justify-between">
        <span class="flex min-w-0 items-center justify-between space-x-3">
         <x-avatar md label="AB" />
         <span class="flex min-w-0 flex-1 flex-col">
          <span class="truncate uppercase text-sm font-medium text-gray-900">{{ auth()->user()->name }}</span>
          <span class="truncate text-sm text-gray-500">{{ auth()->user()->role->name }}</span>
         </span>
        </span>
        <!-- Heroicon name: mini/chevron-up-down -->
        <svg class="h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
         <path fill-rule="evenodd"
          d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
          clip-rule="evenodd" />
        </svg>
       </span>
      </button>
     </div>

     <!--
          Dropdown menu, show/hide based on menu state.

          Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
          Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        -->
     <div x-show="userdropdown" x-cloak
      class="absolute right-0 left-0 z-10 mx-3 mt-2 origin-top divide-y divide-gray-200 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
      <div class="py-1" role="none">
       <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
       <a href="#"
        class="text-gray-700 flex space-x-2 hover:text-green-600 hover:fill-green-600 px-4 py-2 items-center text-sm"
        role="menuitem" tabindex="-1" id="options-menu-item-5">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4">
         <path fill="none" d="M0 0h24v24H0z" />
         <path
          d="M12 14v2a6 6 0 0 0-6 6H4a8 8 0 0 1 8-8zm0-1c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm2.595 7.812a3.51 3.51 0 0 1 0-1.623l-.992-.573 1-1.732.992.573A3.496 3.496 0 0 1 17 14.645V13.5h2v1.145c.532.158 1.012.44 1.405.812l.992-.573 1 1.732-.992.573a3.51 3.51 0 0 1 0 1.622l.992.573-1 1.732-.992-.573a3.496 3.496 0 0 1-1.405.812V22.5h-2v-1.145a3.496 3.496 0 0 1-1.405-.812l-.992.573-1-1.732.992-.572zM18 19.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
        </svg>
        <span>View Profile</span></a>
      </div>
      <div class="py-1" role="none">
       <a href="#" x-on:click="logout = true"
        class="text-gray-700 flex space-x-2 hover:text-green-600 hover:fill-green-600 px-4 py-2 items-center text-sm"
        role="menuitem" tabindex="-1" id="options-menu-item-5">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4">
         <path fill="none" d="M0 0h24v24H0z" />
         <path
          d="M5 22a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3h-2V4H6v16h12v-2h2v3a1 1 0 0 1-1 1H5zm13-6v-3h-7v-2h7V8l5 4-5 4z" />
        </svg>
        <span>Logout</span></a>
      </div>
     </div>
    </div>
    <!-- Sidebar Search -->

    <!-- Navigation -->
    <nav class="mt-6 px-3">
     <div class="space-y-1">
      <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
      <a href="{{ route('staff.dashboard') }}"
       class=" {{ request()->routeIs('staff.dashboard') ? 'bg-gray-100' : 'bg-gray-300' }} hover:bg-gray-200 text-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
       aria-current="page">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-700 mr-3 flex-shrink-0 h-6 w-6">
        <path fill="none" d="M0 0H24V24H0z" />
        <path
         d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2zm0 2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm0 1c1.018 0 1.985.217 2.858.608L13.295 7.17C12.882 7.06 12.448 7 12 7c-2.761 0-5 2.239-5 5 0 1.38.56 2.63 1.464 3.536L7.05 16.95l-.156-.161C5.72 15.537 5 13.852 5 12c0-3.866 3.134-7 7-7zm6.392 4.143c.39.872.608 1.84.608 2.857 0 1.933-.784 3.683-2.05 4.95l-1.414-1.414C16.44 14.63 17 13.38 17 12c0-.448-.059-.882-.17-1.295l1.562-1.562zm-2.15-2.8l1.415 1.414-3.724 3.726c.044.165.067.338.067.517 0 1.105-.895 2-2 2s-2-.895-2-2 .895-2 2-2c.179 0 .352.023.517.067l3.726-3.724z" />
       </svg>
       Dashboard
      </a>

     </div>
     <div class="mt-8 border-t">
      <!-- Secondary navigation -->
      <h3 class="px-1 text-sm font-medium text-gray-500" id="desktop-teams-headline">MANAGE</h3>
      <div class="mt-1 space-y-1" role="group" aria-labelledby="desktop-teams-headline">
       <a href="{{ route('staff.client') }}"
        class="{{ request()->routeIs('staff.client') ? 'bg-gray-100' : 'bg-gray-300' }}  hover:bg-gray-200 text-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
        aria-current="page">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-700 mr-3 flex-shrink-0 h-6 w-6">
         <path fill="none" d="M0 0h24v24H0z" />
         <path d="M5 20h14v2H5v-2zm7-2a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm0-2a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
        </svg>
        Clients
       </a>

       <a href="{{ route('staff.request') }}"
        class="{{ request()->routeIs('staff.request') ? 'bg-gray-100' : 'bg-gray-300' }} hover:bg-gray-200 text-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
        aria-current="page">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-700 mr-3 flex-shrink-0 h-6 w-6">
         <path fill="none" d="M0 0h24v24H0z" />
         <path
          d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zM4 9v10h16V9H4zm2 2h2v2H6v-2zm0 4h2v2H6v-2zm4-4h8v2h-8v-2zm0 4h5v2h-5v-2z" />
        </svg>
        <span class="flex-1"> Requests</span>
        <span
         class="bg-gray-400 text-white  group-hover:bg-white group-hover:text-gray-700 ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full">{{ App\Models\RequestTransaction::where('status', 1)->count() }}</span>
       </a>
       <a href="{{ route('staff.document') }}"
        class="{{ request()->routeIs('staff.document') ? 'bg-gray-100' : 'bg-gray-300' }} bg-gray-100 hover:bg-gray-200 text-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
        aria-current="page">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-700 mr-3 flex-shrink-0 h-6 w-6">
         <path fill="none" d="M0 0h24v24H0z" />
         <path
          d="M3.087 9h17.826a1 1 0 0 1 .997 1.083l-.834 10a1 1 0 0 1-.996.917H3.92a1 1 0 0 1-.996-.917l-.834-10A1 1 0 0 1 3.087 9zM4.84 19h14.32l.666-8H4.174l.666 8zm8.574-14H20a1 1 0 0 1 1 1v1H3V4a1 1 0 0 1 1-1h7.414l2 2z" />
        </svg>
        Documents
       </a>
       <a href="{{ route('staff.reports') }}"
        class="{{ request()->routeIs('staff.reports') ? 'bg-gray-100' : 'bg-gray-300' }} bg-gray-100 hover:bg-gray-200 text-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
        aria-current="page">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-gray-700 mr-3 flex-shrink-0 h-6 w-6">
         <path fill="none" d="M0 0h24v24H0z" />
         <path
          d="M11 7h2v10h-2V7zm4 4h2v6h-2v-6zm-8 2h2v4H7v-4zm8-9H5v16h14V8h-4V4zM3 2.992C3 2.444 3.447 2 3.999 2H16l5 5v13.993A1 1 0 0 1 20.007 22H3.993A1 1 0 0 1 3 21.008V2.992z" />
        </svg>
        Reports
       </a>
       {{-- <a href="{{ route('staff.deed-of-sale') }}"
                class="{{ request()->routeIs('staff.reports') ? 'bg-gray-100' : 'bg-gray-300' }} bg-gray-100 hover:bg-gray-200 text-gray-700 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                aria-current="page">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                  class="fill-gray-700 mr-3 flex-shrink-0 h-6 w-6">
                  <path
                    d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                  </path>
                </svg>
                Deed Of Sale
              </a> --}}
      </div>
     </div>
    </nav>
   </div>
  </div>
  <!-- Main column -->
  <div class="flex flex-col lg:pl-64">
   <!-- Search header -->
   <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 border-b border-gray-200 bg-white lg:hidden">
    <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
    <button type="button"
     class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
     <span class="sr-only">Open sidebar</span>
     <!-- Heroicon name: outline/bars-3-center-left -->
     <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
      stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
     </svg>
    </button>
    <div class="flex flex-1 justify-between px-4 sm:px-6 lg:px-8">
     <div class="flex flex-1">
      <form class="flex w-full md:ml-0" action="#" method="GET">
       <label for="search-field" class="sr-only">Search</label>
       <div class="relative w-full text-gray-400 focus-within:text-gray-600">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
         <!-- Heroicon name: mini/magnifying-glass -->
         <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
          aria-hidden="true">
          <path fill-rule="evenodd"
           d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
           clip-rule="evenodd" />
         </svg>
        </div>
        <input id="search-field" name="search-field"
         class="block h-full w-full border-transparent py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:border-transparent focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm"
         placeholder="Search" type="search">
       </div>
      </form>
     </div>
     <div class="flex items-center">
      <!-- Profile dropdown -->
      <div class="relative ml-3">
       <div>
        <button type="button"
         class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
         id="user-menu-button" aria-expanded="false" aria-haspopup="true">
         <span class="sr-only">Open user menu</span>
         <img class="h-8 w-8 rounded-full"
          src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
          alt="">
        </button>
       </div>

       <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
       <div
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right divide-y divide-gray-200 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <div class="py-1" role="none">
         <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
         <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
          id="user-menu-item-0">View profile</a>
         <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
          id="user-menu-item-1">Settings</a>
         <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
          id="user-menu-item-2">Notifications</a>
        </div>
        <div class="py-1" role="none">
         <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
          id="user-menu-item-3">Get desktop app</a>
         <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
          id="user-menu-item-4">Support</a>
        </div>
        <div class="py-1" role="none">
         <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
          id="user-menu-item-5">Logout</a>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
   <main class="flex-1">
    <!-- Page title & actions -->
    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
     <div class="min-w-0 flex-1">
      <h1 class="text-lg font-medium leading-6 text-gray-600 sm:truncate">ARMADA & HILARIO LAW OFFICES </h1>
     </div>
    </div>
    <!-- Pinned projects -->
    <div class="mt-6 px-4 sm:px-6 lg:px-8">
     {{ $slot }}
    </div>

   </main>
  </div>
 </div>
 <div x-show="logout" x-cloak class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
  <div x-show="logout" x-cloak x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
   x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
   x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
   class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
  </div>

  <div class="fixed inset-0 z-10 overflow-y-auto">
   <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
    <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
    <div x-show="logout" x-cloak x-transition:enter="ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
     class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm">
     <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
      <div class="sm:flex sm:items-start">
       <div
        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
        <!-- Heroicon name: outline/exclamation-triangle -->
        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
         <path stroke-linecap="round" stroke-linejoin="round"
          d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
        </svg>
       </div>
       <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Logout Account</h3>
        <div class="mt-2">
         <p class="text-sm text-gray-500">Are you sure you want to logout your account? </p>
        </div>
       </div>
      </div>
     </div>
     <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse  sm:px-6">
      <form method="POST" action="{{ route('logout') }}" class="flex space-x-2">
       @csrf
       <x-button @click="logout=false" label="Cancel" sm icon="x" />
       <x-button href="{{ route('logout') }}"
        onclick="event.preventDefault();
              this.closest('form').submit();" label="Logout" icon="logout"
        sm red />
      </form>

     </div>
    </div>
   </div>
  </div>
 </div>

 <x-dialog z-index="z-50" blur="md" align="center" />
 <x-notifications position="bottom-right" z-index="z-40" />

 @livewireScripts

 @stack('scripts')
</body>

</html>
