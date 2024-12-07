<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply px-6 lg:px-10 mx-auto max-w-screen-lg;
            }
        }
    </style>
    <title>Post View</title>
</head>

<body class="bg-gray-50 text-gray-800">
    <div class="container">
        <!-- Header -->
        <div class="flex justify-between items-center my-5">
            <h2 class="text-red-500 text-2xl font-bold">Post View</h2>
            <a href="/" class="bg-green-600 text-white rounded-lg py-2 px-4 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Back to home
            </a>
        </div>

        <!-- Post Content -->
        <div class="bg-white shadow rounded-lg p-6">
            <p class="text-lg mb-4">Title: <b class="text-gray-900">{{$ourPost->name}}</b></p>
            <p class="text-lg mb-4">Description: <b class="text-gray-700">{{$ourPost->description}}</b></p>
            <div class="flex justify-center">
                <img src="/images/{{$ourPost->image}}" alt="Picture Not Found" class="rounded-lg shadow-md w-60">
            </div>
        </div>
    </div>
</body>

</html>
