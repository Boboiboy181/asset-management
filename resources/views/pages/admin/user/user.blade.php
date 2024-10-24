@extends('layouts.admin.admin')

@section('custome-styles')
<link
  href="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}"
  rel="stylesheet">
@endsection

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
      <a class="m-0 font-weight-bold text-primary" href="{{route('admin.user.create')}}">Add new user</a>
    </div>
    <div class="card-body">
      <x-table :field1="'Id'" :field2="'Name'" :field3="'Email'" :field4="'Role'">
  
        @foreach ($users as $user)
          <x-table-row :data1="$user->id" :data2="$user->name" :data3="$user->email" :data4="$user->role"
              :detail_url="'#'" :is_user="true" />
        @endforeach
      </x-table>
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
            <form id="modalDelete" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" id="btn-submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('custome-scripts')
<script
  src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}">
</script>
<script
  src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/demo/datatables-demo.js') }}">
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
      const showModalBtns = document.querySelectorAll('.showModalBtn');
      const modalDelete = document.getElementById('modalDelete');

      showModalBtns.forEach(element => {
        element.addEventListener('click', function () {
          const id = this.getAttribute('data-id');          
          modalDelete.action = `/dashboard/users/delete/${id}`;
        });
      });
  });
</script>
@endsection