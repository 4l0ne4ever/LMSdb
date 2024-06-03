<!-- resources/views/admin/pending_books.blade.php -->

@foreach ($pending as $book)
    <div>
        {{ $book->title }} - {{ $book->author }}

        <form method="POST" action="{{ route('manager.books.approve', $book->id) }}">
            @csrf
            <button type="submit" name="action" value="approve">Approve</button>
            <button type="submit" name="action" value="reject">Reject</button>
        </form>
    </div>
@endforeach
