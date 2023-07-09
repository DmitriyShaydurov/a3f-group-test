<!DOCTYPE html>
<html>
<head>
    <title>Tag Counts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
     <a href="/" class="home-button bg-black text-white rounded-full px-4 py-2">Home</a>
    <div class="bg-white rounded-lg shadow mx-auto p-8 overflow-auto">

         @if ($error)
            <div class="bg-red-500 text-white p-6 rounded mb-4">
                {{ $error }}
            </div>
        @else
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-gray-300 font-bold uppercase text-sm text-gray-900 border-b">Tag</th>
                    <th class="py-4 px-6 bg-gray-300 font-bold uppercase text-sm text-gray-900 border-b">Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tagCounts as $tag => $count)
                <tr>
                    <td class="py-4 px-6 border-b">{{ $tag }}</td>
                    <td class="py-4 px-6 border-b">{{ $count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>
</html>