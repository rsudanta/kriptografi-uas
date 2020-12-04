@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ implode('', $errors->all()) }}
                    </div>
                @endif
                <h2>Decode</h2>
                @foreach ($items as $item)
                    <div class="clearfix pt-2">
                        {{ $item->user->name }} : {{ $item->encrypted }}
                    </div>
                @endforeach

                <form action="{{ route('decode', $item->id) }}" method="POST">
                    @csrf
                    <div class="input-group pt-4">
                        <input type="text" name="key" class="form-control" placeholder="Type your key here...">
                        <button class="btn btn-primary">
                            Send
                        </button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
