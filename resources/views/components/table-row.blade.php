@props([
'data1',
'data2',
'data3',
'data4',
'data5',
'detail_url'
])

<tr>
  <td>{{$data1}}</td>
  <td>{{$data2}}</td>
  @if(gettype($data3) == 'string')
  <td>{{$data3}}</td>
  @else
  <td>{{ number_format($data3, 0, ',', ',') }} VNĐ</td>
  @endif
  <td>{{$data4}}</td>
  @isset($data5)
  <td>
    {{$data5}}
  </td>
  @endisset
  <td>
    <a href="{{$detail_url}}" class="btn btn-info">Detail</a>
  </td>
</tr>