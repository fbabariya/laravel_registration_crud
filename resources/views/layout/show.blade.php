@extends('layout.main')
@section('content')
    <div class="album py-5" style="height:120vh;">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card border-success" style="max-width: 65rem;padding: 2%;">
                <h2>User Details </h2>
                <hr>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Meet"
                                required=""value="{{ $crud->first_name }}" disabled>
                        </div>
                        <div class="col">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Shah"
                                required=""value="{{ $crud->last_name }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com" required=""value="{{ $crud->email }}" disabled>
                        </div>
                        <div class="col">
                            <label for="mobile" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" id="contact" name="contact"
                                placeholder="1234567890" required=""value="{{ $crud->contact }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="gender" class="form-label">Gender</label><br>
                            <input type="radio" id="gender" name="gender" value="Male"
                                @if ($crud->gender == 'Male') checked @endif disabled>Male
                            <input type="radio" id="gender" name="gender" value="Female"
                                @if ($crud->gender == 'Female') checked @endif disabled>Female
                        </div>
                        <div class="col">
                            <label for="hobbies" class="form-label">Hobbies</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hobies[]"
                                    value="Travelling"@if (in_array('Travelling', $crud->hobies_arr)) checked @endif disabled>
                                <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobies[]"
                                    value="Music" @if (in_array('Music', $crud->hobies_arr)) checked @endif disabled>
                                <label class="form-check-label" for="inlineCheckbox2">Music</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobies[]"
                                    value="Coding" @if (in_array('Coding', $crud->hobies_arr)) checked @endif disabled>
                                <label class="form-check-label" for="inlineCheckbox3">Coding</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" rows="3" name="address" placeholder="address"
                                required=""disabled>{{ $crud->address }}</textarea>
                        </div>
                        <div class="col">
                            <label for="inputCountry" class="form-label">Country</label>
                            <select class="form-select" name="country_id" id="inputCountry"
                                aria-label="Default select example" required="" disabled>
                                <option selected>Select</option>

                                @foreach ($countries as $cont)
                                    <option value="{{ $cont->id }}" @if ($crud->country_id == $cont->id) selected @endif>
                                        {{ $cont->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="profile" class="form-label">Profile</label><br>
                            @php
                                $profileImages = is_array($crud->profile)
                                    ? $crud->profile
                                    : unserialize($crud->profile);
                            @endphp
                            @foreach ($profileImages as $image)
                                <div class="profile-image">
                                    <img src="{{ url('profile_pictures') . '/' . $image }}" alt="Profile Image"
                                        height="100" />
                                    <button type="button" class="remove-image btn btn-danger btn-sm">Remove</button>
                                    <!-- Hidden input for deleted images -->
                                    <input type="hidden" name="deleted_images[]" value="{{ $image }}">
                                </div>
                            @endforeach
                            <input type="file" name="profile[]" multiple>
                        </div>
                    </div>

                    <br>


                </div>
            </div>
        </div>
    </div>
@endsection
