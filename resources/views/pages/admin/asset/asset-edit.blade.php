@extends('layouts.admin.admin')

@section('contents')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end">
                <a href="{{ route('admin.asset.detail', ['id' => $asset->id]) }}">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset($asset->image_url) }}" alt="{{ $asset->name }}" class="w-100 rounded-md">
                    </div>
                    <div class="col-md-9">
                        <form id="form-submit" action="{{ route('admin.asset.update', ['id' => $asset->id]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input class="rounded-md w-full" type="text" class="form-control @error('name') is-invalid @enderror"
                                     id="name" name="name" placeholder="Enter product name" required value="{{ $asset->name }}">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="value">Value</label>
                              <input class="rounded-md w-full" type="number" class="form-control @error('value') is-invalid @enderror"
                                     id="value" name="value" placeholder="Enter asset value" value="{{ $asset->value }}" required>
                              @error('value')
                              <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="residual_value">Residual Value</label>
                              <input class="rounded-md w-full" type="number" class="form-control @error('residual_value') is-invalid @enderror"
                                     id="residual_value" name="residual_value" placeholder="Enter residual value" value="{{ $asset->residual_value }}" required>
                              @error('residual_value')
                              <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="form-group">
                            <label for="purchased_year">Purchased Year</label>
                            <input class="rounded-md w-full" type="number" class="form-control @error('purchased_year') is-invalid @enderror"
                                   id="purchased_year" name="purchased_year" placeholder="Enter purchased year" value="{{ $asset->purchased_year }}" required>
                            @error('purchased_year')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                          <label for="expired_year">Expired Year</label>
                          <input class="rounded-md w-full" type="number" class="form-control @error('expired_year') is-invalid @enderror"
                                 id="expired_year" name="expired_year" placeholder="Enter expired year" value="{{ $asset->expired_year }}" required>
                          @error('expired_year')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                           
                            <div>
                                <button type="button" data-toggle="modal" data-target="#confirmModal"
                                    class="btn btn-success">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModal">Are you sure to update?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Update" below if you want to make this change.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="btn-submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custome-scripts')
    <script>
        $(document).ready(function() {
            $('#btn-submit').click(function() {
                $('#form-submit').submit();
            });
        });
    </script>
@endsection
