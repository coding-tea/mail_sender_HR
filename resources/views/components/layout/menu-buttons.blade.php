<div class="flex flex-col items-center flex-1 p-2 space-y-4">
    <!-- Menu button -->
    <button
        @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
        class="p-2 transition-colors rounded-lg shadow-md hover:blue-700 hover:text-white focus:outline-none focus:ring focus:ring-blue-500 focus:ring-offset-white focus:ring-offset-2"
        :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-blue-500' :
        'text-gray-500 bg-white'">
        <span class="sr-only">Toggle sidebar</span>
        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
    </button>

    <!-- emails button -->
    <button
        @click="(isSidebarOpen && currentSidebarTab == 'emailsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'emailsTab'"
        class="p-2 transition-colors rounded-lg shadow-md hover:bg-blue-800 hover:text-white focus:outline-none focus:ring focus:ring-blue-500 focus:ring-offset-white focus:ring-offset-2"
        :class="(isSidebarOpen && currentSidebarTab == 'emailsTab') ? 'text-white bg-blue-500' :
        'text-gray-500 bg-white'">
        <span class="sr-only">Toggle Emails panel</span>
        <div class="w-6 h-6">
            <i class="bi bi-envelope" style="font-weight: bold; font-size: 20px;"></i>
        </div>
    </button>




    <!-- Messages button -->
    <button
        @click="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'messagesTab'"
        class="p-2 transition-colors rounded-lg shadow-md hover:bg-blue-800 hover:text-white focus:outline-none focus:ring focus:ring-blue-500 focus:ring-offset-white focus:ring-offset-2"
        :class="(isSidebarOpen && currentSidebarTab == 'messagesTab') ? 'text-white bg-blue-500' :
        'text-gray-500 bg-white'">
        <span class="sr-only">Toggle message panel</span>
        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
    </button>
</div>
