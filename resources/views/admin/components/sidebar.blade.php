<nav class="p-4">
    <div class="space-y-4">
        <!-- Dashboard -->
        <!-- Courses -->
        <a href="{{ route('admin.courses') }}"
            class="flex items-center p-3 rounded-lg transition-colors
{{ request()->routeIs('admin.courses') ? 'bg-white text-blue-600 shadow-lg border-b-4 border-blue-600' : 'text-white hover:bg-gray-700' }}">
            <i class="fas fa-book w-6 mr-2"></i>
            <span>Courses</span>
        </a>

        <!-- Enrollments -->
        <a href="{{ route('admin.enrollments') }}"
            class="flex items-center p-3 rounded-lg transition-colors
{{ request()->routeIs('admin.enrollments') ? 'bg-white text-blue-600 shadow-lg border-b-4 border-blue-600' : 'text-white hover:bg-gray-700' }}">
            <i class="fas fa-users w-6 mr-2"></i>
            <span>Enrollments</span>
        </a>
        <!-- Settings -->
        <a href=""
            class="flex items-center p-3 rounded-lg transition-colors
{{ request()->routeIs('admin.settings') ? 'bg-white text-blue-600 shadow-lg border-b-4 border-blue-600' : 'text-white hover:bg-gray-700' }}">
            <i class="fas fa-cog w-6 mr-2"></i>
            <span>Settings</span>
        </a>

        <!-- Reports -->
        <a href=""
            class="flex items-center p-3 rounded-lg transition-colors
{{ request()->routeIs('admin.reports') ? 'bg-white text-blue-600 shadow-lg border-b-4 border-blue-600' : 'text-white hover:bg-gray-700' }}">
            <i class="fas fa-chart-bar w-6 mr-2"></i>
            <span>Reports</span>
        </a>

    </div>

    <!-- Teams Section -->
    {{-- <div class="mt-8">
        <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">
            Your teams
        </h3>
        <div class="mt-2 space-y-2">
            <a href="#" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition-colors">
                <span class="w-6 h-6 rounded bg-gray-700 flex items-center justify-center text-sm mr-2">H</span>
                <span>Heroicons</span>
            </a>
            <a href="#" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition-colors">
                <span class="w-6 h-6 rounded bg-gray-700 flex items-center justify-center text-sm mr-2">T</span>
                <span>Tailwind Labs</span>
            </a>
            <a href="#" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition-colors">
                <span class="w-6 h-6 rounded bg-gray-700 flex items-center justify-center text-sm mr-2">W</span>
                <span>Workcation</span>
            </a>
        </div>
    </div> --}}
    {{-- end teams section --}}

</nav>
