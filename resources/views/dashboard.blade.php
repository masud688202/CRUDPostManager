<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="container mx-auto my-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Welcome, {{ Auth::user()->name }}!</h2> <!-- Display the active user's name -->
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 text-white rounded py-2 px-4">Logout</button>
            </form>
        </div>

        <!-- Buttons to Manage and View Posts -->
        <div class="flex justify-center gap-6">
            <!-- Button to view all posts -->
            <a href="{{ route('posts.index') }}" class="bg-blue-600 text-white rounded py-2 px-6 hover:bg-blue-700">
                All Posts
            </a>

            <!-- Button to manage posts (CRUD page) -->
            <a href="{{ route('posts.manage') }}" class="bg-green-600 text-white rounded py-2 px-6 hover:bg-green-700">
                Manage Posts
            </a>
        </div>
    </div>
</body>
</html>
