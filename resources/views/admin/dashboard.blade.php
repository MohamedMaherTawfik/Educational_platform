<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - e-learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#1a1f36] text-gray-300">
            <!-- Logo -->
            <div class="flex items-center p-4 border-b border-gray-700">
                <div class="text-blue-500 text-2xl mr-2">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <span class="text-xl font-semibold text-white">E-Learning</span>
            </div>

            <!-- Navigation -->
            @include('admin.components.sidebar')

            <!-- Settings at bottom -->
            <div class="absolute bottom-0 w-64 p-4 border-t border-gray-700">
                <a href="#" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition-colors">
                    <i class="fas fa-cog w-6"></i>
                    <span>Settings</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            @include('admin.components.navbar')

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4">
                <!-- Your dashboard content goes here -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Welcome to Dashboard</h2>
                    <p class="text-gray-600">This is your admin dashboard. You can customize this area with widgets, charts, and other content.</p>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
