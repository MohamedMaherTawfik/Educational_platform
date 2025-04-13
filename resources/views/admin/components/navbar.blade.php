<header class="flex items-center justify-between p-4 bg-white border-b">
    <!-- Search -->
    <div class="flex items-center w-96">
        <div class="relative w-full">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fas fa-search text-gray-400"></i>
            </span>
            <input type="text" placeholder="Search"
                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>
    </div>

    <!-- Right Side Items -->
    <div class="flex items-center space-x-4">
        <!-- Notification -->
        <button class="relative p-2 hover:bg-gray-100 rounded-full">
            <i class="fas fa-bell text-gray-600"></i>
            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <!-- Profile -->
        <div class="relative group inline-block">
            <!-- Username Button -->
            <!-- Dropdown Menu -->
            <div class="relative">
                <!-- Hidden checkbox for toggle -->
                <input type="checkbox" id="dropdown-toggle" class="peer hidden">

                <!-- Label acts as the clickable area (e.g., username) -->
                <label for="dropdown-toggle" class="flex items-center space-x-2 cursor-pointer">
                    <span class="text-gray-700 peer-checked:text-blue-600">{{ Auth::user()->username }}</span>
                    <svg class="w-4 h-4 text-gray-500 peer-checked:rotate-180 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </label>

                <!-- Dropdown menu shown when checkbox is checked -->
                <div
                    class="absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden peer-checked:block z-50">
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>

        </div>

    </div>
</header>
