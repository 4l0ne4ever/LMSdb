<div class="container">
    <h2>Lost Books Report</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table>
    <thead>
        <tr>
            <th>Reader Name</th>
            <th>Book Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lostBooks as $lostBook)
            <tr>
                <td>{{ $lostBook->reader->name }}</td>
                <td>{{ $lostBook->book->title }}</td>
                <td>
        <form action="{{ route('approve.lost', ['borrowId' => $lostBook->id]) }}" method="POST">
            @csrf
            <button type="submit">OK</button>
        </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>