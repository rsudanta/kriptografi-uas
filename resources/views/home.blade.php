@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Messages</h2>
                @forelse ($items as $item)
                    <div class="clearfix pt-2">
                        {{ $item->user->name }} : {{ $item->status->status == 'NOT' ? $item->encrypted : $item->decrypted }}
                        @if ($item->status->status == 'NOT')
                            <a href="{{ route('show', $item->id) }}" class="btn btn-dark ml-5">Decode</a>
                        @endif
                    </div>
                @empty
                    <div class="clearfix">
                        Tidak ada pesan
                    </div>
                @endforelse

                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="input-group pt-4">
                        <input type="hidden" name="id" class="form-control">
                        <input type="text" name="message" class="form-control" placeholder="Type your message here...">
                        <input type="text" name="key" class="form-control" placeholder="Type your key here...">

                        <button class="btn btn-primary">
                            Send
                        </button>
                </form>
                <form action="{{ route('rot13') }}" method="POST">
                    @csrf
                    <div class="input-group pt-4">
                        <input type="hidden" name="id" class="form-control">
                        <input type="text" name="message" class="form-control" placeholder="Type your message here...">
                        <button class="btn btn-primary">
                            Send
                        </button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
