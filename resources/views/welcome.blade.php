<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical Data Collection</title>
    <style>
        /* Basic web design colors and minimalistic styling */
        body {
            background-color: #F3F4F6; /* Light Gray Background */
            color: #333333; /* Dark Gray Text */
            font-family: 'Arial', sans-serif;
        }

        .nav-link:hover {
            color: #4B5563; /* Medium Gray Hover */
        }

        .feature-box {
            background-color: #FFFFFF;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #1E3A8A; /* Dark Blue Button */
            color: #FFFFFF;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #4B5563; /* Medium Gray Button Hover */
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Header Section -->
    <header class="header-bg py-6 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-3xl font-bold">Praktik <span class="text-3xl font-bold bg-sky-400 rounded-lg p-1 text-white">U</span></h1>
            <nav>
                <a href="{{ route('login') }}" class="nav-link mx-4">Login</a>
                <a href="{{ route('register') }}" class="nav-link mx-4">Register</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-12 p-6 bg-white shadow-lg rounded-lg">
        <div class="text-center">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-4">Effortlessly Manage Practical Sessions</h2>
            <p class="text-gray-600 text-lg mb-8">A streamlined platform for all your data collection needs.</p>
            <a href="{{ route('register') }}" class="btn-primary">Get Started</a>
        </div>

        <!-- Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <div class="feature-box p-6 rounded-lg shadow-md text-center">
                <h3 class="text-2xl font-semibold text-gray-700">Organize Data</h3>
                <p class="text-gray-600 mt-2">Keep all your practical session data organized in one place.</p>
            </div>
            <div class="feature-box p-6 rounded-lg shadow-md text-center">
                <h3 class="text-2xl font-semibold text-gray-700">Monitor Progress</h3>
                <p class="text-gray-600 mt-2">Stay updated with students' progress and attendance.</p>
            </div>
            <div class="feature-box p-6 rounded-lg shadow-md text-center">
                <h3 class="text-2xl font-semibold text-gray-700">Generate Reports</h3>
                <p class="text-gray-600 mt-2">Analyze outcomes and gain valuable insights.</p>
            </div>
        </div>
    </main>

</body>
</html>
