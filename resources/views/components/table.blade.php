@props(['field1', 'field2', 'field3', 'field4', 'field5'])

<div class="table-responsive">
  <table class="table table-bordered" id="dataTable">
    <thead>
      <tr>
        <th>{{$field1}}</th>
        <th>{{$field2}}</th>
        <th>{{$field3}}</th>
        <th>{{$field4}}</th>
        @isset($field5)
        <th>{{$field5}}</th>
        @endisset
        <th style="width: 50px">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>{{$field1}}</th>
        <th>{{$field2}}</th>
        <th>{{$field3}}</th>
        <th>{{$field4}}</th>
        @isset($field5)
        <th>{{$field5}}</th>
        @endisset
        <th style="width: 50px">Action</th>
      </tr>
    </tfoot>
    <tbody>
      {!! $slot !!}
    </tbody>
  </table>
</div>