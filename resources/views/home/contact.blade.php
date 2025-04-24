<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="bg-white shadow-2xl rounded-2xl max-w-4xl w-full p-8 md:p-16 grid md:grid-cols-2 gap-8">
            <!-- Left Side: Contact Info -->
            <div>
                <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
                <p class="text-gray-600 mb-6">We’d love to hear from you! Fill out the form and we’ll get back to you shortly.</p>

                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-inbox"></i>
                        <span>contact@example.com</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-phone"></i>
                        <span>+1 (123) 456-7890</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>123 Main St, City, Country</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: Form -->
            <form class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold mb-1">Full Name</label>
                    <input type="text" placeholder="Your Name" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" placeholder="you@example.com" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Message</label>
                    <textarea rows="4" placeholder="Your message..." class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-xl hover:bg-blue-700 transition">Send Message</button>
            </form>
        </div>
    </div>

</body>
</html>
