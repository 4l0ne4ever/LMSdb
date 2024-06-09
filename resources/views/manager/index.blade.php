<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="max-w-7xl mx-auto px-4 sp:px-6 lg:px-8">

    <x-app-layout>
    </x-app-layout>
    </div>
    
    <div><a href="{{ route('manager.borrow_requests') }}" class="btn btn-secondary">Borrow Requests</a></div>
    <br>
<div>
<a href="{{ route('manager.books.pending') }}" class="btn btn-primary">See Contribution Requests</a>
</div>
</body>
</html>