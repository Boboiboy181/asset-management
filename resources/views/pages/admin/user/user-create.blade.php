
@extends('layouts.admin.admin')

@section('contents')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end">
                <a href="{{ route('admin.asset') }}">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img id="preview" src="https://avatars.githubusercontent.com/u/110546242?" alt="" class="w-100 rounded-md">
                    </div>
                    <div class="col-md-9">
                        <form id="form-submit" method="POST" action="{{ route('users.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="rounded-md w-full" type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" placeholder="Enter user name" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="rounded-md w-full" type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" placeholder="Enter user email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="rounded-md w-full" type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" placeholder="Enter user password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="rounded-md w-full form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                                    <option value="" disabled selected>Select user role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Department User">Department User</option>
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            

                            <div>
                                <button type="submit" class="btn btn-success">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custome-scripts')
    <script>
        $('#category').change(function () {
            const selectedValue = $(this).val();

            if (selectedValue === 'pizza') {
                $('#additional-side').hide();
                $('#additional-pizza').show();

                $('#side-variant, #side-topping').removeAttr('name');

                $('#pizza-variant').attr('name', 'additionalProperties[variant]');
                $('#pizza-topping').attr('name', 'additionalProperties[topping]');
            } else if (selectedValue === 'side') {
                $('#additional-pizza').hide();
                $('#additional-side').show();

                $('#pizza-variant, #pizza-topping').removeAttr('name');

                $('#side-variant').attr('name', 'additionalProperties[variant]');
                $('#side-topping').attr('name', 'additionalProperties[topping]');
            } else {
                $('#additional-pizza').hide();
                $('#additional-side').hide();
            }
        });

        $('#image_url').change(function (event) {
            const input = event.target;

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('preview').src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
