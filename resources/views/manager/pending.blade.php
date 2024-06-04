
@foreach ($books as $book)
    <div>
        <h2>{{ $book->title }}</h2>
        <p>{{ $book->author }}</p>
        <form method="POST" action="{{ route('manager.books.handle', ['id' => $book->id, 'action' => 'approve']) }}">
            @csrf
            <button type="submit">Approve</button>
        </form>
        <form method="POST" action="{{ route('manager.books.handle', ['id' => $book->id, 'action' => 'reject']) }}">
            @csrf
            <button type="submit">Reject</button>
        </form>
    </div>
@endforeach


<!-- resources/views/manager/pending.blade.php -->

<a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
