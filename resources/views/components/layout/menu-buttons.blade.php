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
    <!-- Notifications button -->
    <button
        @click="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'notificationsTab'"
        class="p-2 transition-colors rounded-lg shadow-md hover:bg-blue-800 hover:text-white focus:outline-none focus:ring focus:ring-blue-500 focus:ring-offset-white focus:ring-offset-2"
        :class="(isSidebarOpen && currentSidebarTab == 'notificationsTab') ? 'text-white bg-blue-500' :
        'text-gray-500 bg-white'">
        <span class="sr-only">Toggle notifications panel</span>
        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
    </button>
</div>
