
<div class="container">
    <h1>Return Requests</h1>
    @if(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Reader Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($returnRequests as $request)
                <tr>
                    <td>{{ $request->book->title }}</td>
                    <td>{{ $request->reader->name }}</td>
                    <td>
                    <form action="{{ route('manager.confirm.return', ['id' => $request->id]) }}" method="POST">
    @csrf
    <button type="submit">Confirm Return</button>
</form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>