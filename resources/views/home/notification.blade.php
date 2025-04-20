<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachio - Educational Platform</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom CSS -->
    <style>
        .hero-pattern {
            background-image: radial-gradient(#3b82f6 0.5px, transparent 0.5px);
            background-size: 10px 10px;
            opacity: 0.1;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <x-navbar />

    <!-- Notification Page Wrapper -->

    <div class="min-h-screen bg-gray-100 px-4 pt-20 flex justify-center mb-10">
        <!-- Notification Panel -->
        <div class="w-full md:w-4/5 lg:w-3/4 xl:w-2/3 bg-white rounded-2xl shadow-xl p-6 md:p-8">
          <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Notifications</h1>

          <!-- Notification List -->
          <div class="space-y-4">

            <!-- Single Notification -->
            <div class="flex items-start bg-gray-50 rounded-xl p-5 hover:bg-gray-100 transition">
              <div class="w-3 h-3 bg-blue-500 rounded-full mt-2 mr-4"></div>
              <div class="flex-1">
                <p class="text-gray-800">
                  <span class="font-semibold">Your course "Mastering Laravel 12"</span> has been updated with new content.
                </p>
                <p class="text-sm text-gray-500 mt-1">2 hours ago</p>
              </div>
              <button class="text-sm text-gray-500 hover:text-red-500 transition">Dismiss</button>
            </div>

            <!-- Another Notification -->
            <div class="flex items-start bg-gray-50 rounded-xl p-5 hover:bg-gray-100 transition">
              <div class="w-3 h-3 bg-green-500 rounded-full mt-2 mr-4"></div>
              <div class="flex-1">
                <p class="text-gray-800">
                  <span class="font-semibold">Congrats!</span> You earned a certificate for "Tailwind CSS Fundamentals".
                </p>
                <p class="text-sm text-gray-500 mt-1">1 day ago</p>
              </div>
              <button class="text-sm text-gray-500 hover:text-red-500 transition">Dismiss</button>
            </div>

            <!-- Another Notification -->
            <div class="flex items-start bg-gray-50 rounded-xl p-5 hover:bg-gray-100 transition">
              <div class="w-3 h-3 bg-yellow-400 rounded-full mt-2 mr-4"></div>
              <div class="flex-1">
                <p class="text-gray-800">
                  <span class="font-semibold">Reminder:</span> You haven’t logged in for 3 days. Your streak is at risk!
                </p>
                <p class="text-sm text-gray-500 mt-1">3 days ago</p>
              </div>
              <button class="text-sm text-gray-500 hover:text-red-500 transition">Dismiss</button>
            </div>

          </div>
        </div>
      </div>

    {{-- End Notification Page Wrapper --}}



    <hr>
    <!-- Footer -->
    <x-footer />

</body>

</html>
