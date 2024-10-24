
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
                        <img id="preview" src="{{ url('/assets/uploadyourown.png') }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-9">
                        <form id="form-submit" method="POST" action="{{ route('admin.asset.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="rounded-md w-full" type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" placeholder="Enter product name" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="value">Value</label>
                                <input class="rounded-md w-full" type="number" class="form-control @error('value') is-invalid @enderror"
                                       id="value" name="value" placeholder="Enter asset value" required>
                                @error('value')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="residual_value">Residual Value</label>
                                <input class="rounded-md w-full" type="number" class="form-control @error('residual_value') is-invalid @enderror"
                                       id="residual_value" name="residual_value" placeholder="Enter residual value" required>
                                @error('residual_value')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                              <label for="purchased_year">Purchased Year</label>
                              <input class="rounded-md w-full" type="number" class="form-control @error('purchased_year') is-invalid @enderror"
                                     id="purchased_year" name="purchased_year" placeholder="Enter purchased year" required>
                              @error('purchased_year')
                              <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="form-group">
                            <label for="expired_year">Expired Year</label>
                            <input class="rounded-md w-full" type="number" class="form-control @error('expired_year') is-invalid @enderror"
                                   id="expired_year" name="expired_year" placeholder="Enter expired year" required>
                            @error('expired_year')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                            <div class="form-group">
                                <label for="image_url">Asset Image</label>
                                <input class="w-full" type="file" class="form-control-file @error('image_url') is-invalid @enderror"
                                       id="image_url" name="image_url" accept="image/png, image/jpeg, image/jpg" required>
                                @error('image_url')
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
