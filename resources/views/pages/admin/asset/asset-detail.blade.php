
@extends('layouts.admin.admin')

@section('contents')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            <strong>Success!</strong>
            <span>{{ session('success') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end">
                <a href="{{ route('admin.asset') }}">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset($asset->image_url) }}" alt="{{ $asset->name }}" class="w-100 rounded-md">
                    </div>
                    <div class="col-md-9 flex flex-col gap-5">
                        <h3 class="font-weight-bold text-primary">{{ $asset->name }}</h3>
                        <p>Price:
                            <span class="font-weight-bold">{{ number_format($asset->value, 0, ',', ',') }} VNĐ
                            </span>
                        </p>
                        <p>Purchased year:
                            <span class="font-weight-bold">{{ $asset->purchased_year }}
                            </span>
                        </p>
                     
                        <p>Expired year:
                            <span class="font-weight-bold">{{ $asset->expired_year }}
                            </span>
                        </p>
                        <div>
                            <a href="{{ route('admin.asset.edit', ['id' => $asset->id]) }}"
                                class="btn btn-warning">Edit</a>
                            <a data-toggle="modal" data-target="#confirmModal" class="btn btn-danger">Delete</a>
                        </div>
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
                    <h5 class="modal-title" id="confirmModal">Are you sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you want to do this action.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{route('admin.asset.delete', ['id' => $asset->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="btn-submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
