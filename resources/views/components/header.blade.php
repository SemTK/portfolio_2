<header class="bg-white shadow-md py-4 px-4 mb-8">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Left side: Project link -->
        <a href="{{ route('projects.index') }}" class="text-xl font-bold text-gray-700 hover:text-gray-900">
            Projects
        </a>
        <a href="{{ route('contact.create') }}" class="text-xl font-bold text-gray-700 hover:text-gray-900">
            Contact
        </a>

        <!-- Right side: Login/Register or Logout -->
        <div>
            @guest
                <!-- If the user is not logged in, show Login and Register -->
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 font-semibold mr-4">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Register</a>
            @else
                <!-- If the user is logged in, show Logout -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</header>