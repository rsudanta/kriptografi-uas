<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vignere Cipher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<!-- Navbar -->

<body>
    <section class="navbar">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Hidden brand</a>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Vignere Cipher <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rot13_view') }}">ROT 13</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    <!-- End Navbar -->


    <!-- Content -->

    <div class="row">
        <div class="d-none d-lg-block col-md-6">
            <img src="{{ url('img/image1.png') }}" alt="" class="gambar float-left">
        </div>
        <div class="col-md-6 col-sm-12">
            @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="main-content">
                <h1>Encrypt</h1>
                <form action="{{ route('vignere-encrypt') }}" method="POST">
                    @csrf
                    <div class="mt-3 row">
                        <div class="col-lg-6 col-md-12">
                            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="4"
                                placeholder="Enter plain text here..."></textarea>
                        </div>
                        <div class="col-lg-6 col-md-12 key">
                            <input type="text" name="key" class="form-control" placeholder="Enter key here...">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-submit">Encrypt</button>
                    </div>
                </form>
            </div>
            <div class="main-content">
                <h1>Decrypt</h1>
                <form action="{{ route('vignere-decrypt') }}" method="POST">
                    @csrf
                    <div class="form-row mt-3">
                        <div class="col-lg-6 col-md-12">
                            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="4"
                                placeholder="Enter plain text here..."></textarea>
                        </div>
                        <div class="col-lg-6 col-md-12 key">
                            <input type="text" name="key" class="form-control" placeholder="Enter key here...">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-submit">Decrypt</button>
                    </div>
                </form>
            </div>
            @if (strlen(session('encrypted')) > 0)
                <div class="main-content">
                    <div class="form-row">
                        <ul style="list-style:none" class="hasil col-11 p-3">
                            <li><b>ENCRYPTED TEXT :</b> {{ session('encrypted') }} </li>
                            <li><b>DECRYPTED TEXT :</b> {{ session('decrypted') }} </li>
                            <li><b>KEY :</b> {{ session('key') }}</li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
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
