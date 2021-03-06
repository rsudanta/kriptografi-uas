<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<!-- Navbar -->
<body class="container">
    <section class="navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Hidden brand</a>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Vignere Chipper <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ROT 13</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    <!-- End Navbar -->


<!-- Content -->
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Vignere Chipper</h2>
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
            </div>
        </div>
    </div>
    <!-- End Content -->
</body>


<footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
</footer>

</html>
