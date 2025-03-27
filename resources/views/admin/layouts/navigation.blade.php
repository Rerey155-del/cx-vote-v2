<aside class="w-64 min-h-screen bg-white shadow-md flex flex-col">
    <!-- Logo -->
    <div class="p-4">
        <h2 class="text-xl font-bold text-center">Logo</h2>
    </div>

    <!-- Menu -->
    <nav class="flex-1">
        <ul class="space-y-4">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 p-3 text-blue-600 bg-blue-100 rounded-lg">
                    <span class="material-icons">home</span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('candidate') }}" class="flex items-center space-x-2 p-3 hover:bg-gray-100 rounded-lg">
                    <span class="material-icons">groups</span>
                    <span>Candidate</span>
                </a>
            </li>
            <li>
                <a href="{{ route('attendance') }}" class="flex items-center space-x-2 p-3 hover:bg-gray-100 rounded-lg">
                    <span class="material-icons">assignment</span>
                    <span>Attendance</span>
                </a>
            </li>
            <li>
                <a href="{{ route('voters') }}" class="flex items-center space-x-2 p-3 hover:bg-gray-100 rounded-lg">
                    <span class="material-icons">how_to_vote</span>
                    <span>Voters</span>
                </a>
            </li>
            <li>
                <a href="{{ route('reports') }}" class="flex items-center space-x-2 p-3 hover:bg-gray-100 rounded-lg">
                    <span class="material-icons">bar_chart</span>
                    <span>Reports</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
