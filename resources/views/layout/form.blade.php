@if ($errors->any())

    <div class="container">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>

@endif



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Registration Form</title>
    <style>
        .table th {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="contrainer">
        @extends('layout.main')
        @section('content')
            <div class="album py-5" style="height:120vh;">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="card border-success" style="max-width: 65rem;padding: 2%;">
                        <h2> Registration </h2>
                        <hr>
                        <div class="card-body">
                            <form method="POST" action="{{ route('crud.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="first_name"
                                            placeholder="falguni" required="">
                                    </div>
                                    <div class="col">
                                        <label for="lname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="last_name"
                                            placeholder="gajera" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="name@example.com" required="">
                                    </div>
                                    <div class="col">
                                        <label for="mobile" class="form-label">Contact Number</label>
                                        <input type="tel" class="form-control" id="mobile" name="contact"
                                            placeholder="1234567890" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="gender" class="form-label">Gender</label><br>
                                        <input type="radio" id="gender" name="gender" value="Male" checked>Male
                                        <input type="radio" id="gender" name="gender" value="Female">Female
                                    </div>
                                    <div class="col">
                                        <label for="hobbies" class="form-label">Hobbies</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                name="hobies[]" value="Travelling">
                                            <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                name="hobies[]" value="Music">
                                            <label class="form-check-label" for="inlineCheckbox2">Music</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                name="hobies[]" value="Coding">
                                            <label class="form-check-label" for="inlineCheckbox3">Coding</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" rows="3" name="address" placeholder="address" required=""></textarea>
                                    </div>
                                    <div class="col">
                                        <label for="inputCountry" class="form-label">Country</label>
                                        <select class="form-select" name="country_id" id="inputCountry"
                                            aria-label="Default select example" required="">
                                            <option selected disabled>Select</option>
                                            @foreach ($countries as $cont)
                                                <option value="{{ $cont->id }}">{{ $cont->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="profile" class="form-label">Profile</label><br />
                                        <input type="file" class="form-control" name="profile[]"
                                            multiple />

                                    </div>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <input type="submit" name="regist" id="regist" value="submit"
                                        class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
</body>

</html>
