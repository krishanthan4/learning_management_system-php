<?php require_once "function.php"; ?>
<div class="lg:flex lg:flex-row lg:justify-stretch  lg:items-center">
  <div class="">
    <div class="inset-0  z-50 hidden lg:hidden" role="dialog" id="navDiv" aria-modal="true">
      <div class="fixed inset-0 bg-gray-600 z-40 bg-opacity-75" aria-hidden="true"></div>
      <div class="relative z-50 flex-1 h-full flex flex-col max-w-xs ">
        <div class="absolute top-0 right-0 -mr-12 pt-2">
          <button type="button"
            class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            onclick="toggleNavClose();">
            <span class="sr-only">Close sidebar</span>
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex h-full w-64 fixed z-50">
          <div class="flex-1 flex flex-col min-h-0">
            <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
              <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-rose-500-mark-white-text.svg"
                alt="Workflow">
            </div>
            <div class="flex-1 flex flex-col overflow-y-auto bg-gray-800">
            <nav class="flex-1 px-2 py-4">
            <div class="space-y-1">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <div class="flex flex-row justify-center">
                <button class="rounded-full w-10 h-10 bg-gray-400 mb-4 border-gray-600 border-2">
                  <img src="/public/images/new_user.png" class="object-contain" alt="">
                </button>
              </div>
              <a href="/student"
                class=" <?= urlis('/student') ?
                  "bg-gray-900 hover:bg-gray-950" : "hover:bg-gray-700" ?>  text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: outline/view-list -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>

               Assignments 
              </a>
              <a href="/student/lesson-notes"
                class=" <?= urlis('/student/lesson-notes') ?
                  "bg-gray-900 hover:bg-gray-950" : "hover:bg-gray-700" ?>  text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: outline/user-circle -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M11.5 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5m-10 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zM5 3a1 1 0 0 0-1 1h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0zm0 1h3v3H5zm6.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                </svg>
              Lesson Notes
              </a>
              <a onclick="signOut();" class=" cursor-pointer text-gray-300 hover:bg-gray-700 hover:text-white group flex  items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: outline/clock -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>
                Log out
              </a>
            </div>
          </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-shrink-0 w-14" aria-hidden="true">
      </div>
    </div>
    <div class="hidden z-50 lg:flex lg:w-64 lg:fixed lg:inset-y-0">
      <div class="flex-1 flex flex-col min-h-0">
        <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-rose-500-mark-white-text.svg"
            alt="Workflow">
        </div>
        <div class="flex-1 flex flex-col overflow-y-auto bg-gray-800">
          <nav class="flex-1 px-2 py-4">
            <div class="space-y-1">
              <div class="flex flex-row justify-center">
                <button class="rounded-full w-10 h-10 bg-gray-400 mb-4 border-gray-600 border-2">
                  <img src="/public/images/new_user.png" class="object-contain" alt="">
                </button>
              </div>
              <a href="/student"
                class=" <?= urlis('/student') ?
                  "bg-gray-900 hover:bg-gray-950" : "hover:bg-gray-700" ?>  text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: outline/view-list -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                Assignments
              </a>
              <a href="/student/lesson-notes"
                class=" <?= urlis('/student/lesson-notes') ?
                  "bg-gray-900 hover:bg-gray-950" : "hover:bg-gray-700" ?>  text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: outline/user-circle -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M11.5 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5m-10 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zM5 3a1 1 0 0 0-1 1h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0zm0 1h3v3H5zm6.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                </svg>
                Lesson Notes
              </a>
         
              <a class=" cursor-pointer text-gray-300 hover:bg-gray-700 hover:text-white group flex  items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: outline/clock -->
                <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>
                Log out
              </a>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="lg:pl-64 flex flex-col w-0 flex-1">
      <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200">
        <button type="button"
          class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-900 lg:hidden"
          onclick="toggleNavClose();">
          <span class="sr-only">Open sidebar</span>
          <!-- Heroicon name: outline/menu-alt-2 -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </button>
      </div>
    </div>
  </div>
  <div class="main-div">