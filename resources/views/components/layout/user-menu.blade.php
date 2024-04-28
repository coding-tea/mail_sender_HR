<div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
    <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
        class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-offset-white focus:ring-offset-2">
        <img class="w-10 h-10 rounded-lg shadow-md" src="{{ asset('assets/images/logo.png') }}" alt="dashboard logo" />
        <span class="sr-only">User menu</span>
    </button>
    <div x-show="isOpen" @click.away="isOpen = false" @keydown.escape="isOpen = false" x-ref="userMenu" tabindex="-1"
        class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-label="user menu">
        <a href="{{ route("profile.edit") }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your
            Profile</a>

        <a href="#" onclick="logout()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>

        <form action="{{ route('logout') }}" style="display: none" method="post">
            @csrf
            <input type="submit" value="logout" id="logoutBtn">
        </form>
    </div>

    <script>
        function logout() {
            document.querySelector("#logoutBtn").click();
        }
    </script>
</div>
