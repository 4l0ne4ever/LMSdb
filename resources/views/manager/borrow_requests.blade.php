@foreach ($borrowRequests as $request)
    <div>
        <p>{{ $request->reader->name }} wants to borrow {{ $request->book->title }} by {{ $request->book->author}}</p>
        <form action="{{ route('manager.confirm_borrow', $request->id) }}" method="POST">
            @csrf
            <button type="submit">Confirm</button>
        </form>
        <form action="{{ route('manager.cancel_borrow', $request->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Cancel</button>
        </form>
    </div>
@endforeach

<!-- resources/views/manager/pending.blade.php -->

<a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>