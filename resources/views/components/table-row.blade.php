@props(['data1', 'data2', 'data3', 'data4', 'data5', 'detail_url', 'is_user'])

<tr>
    <td>{{ $data1 }}</td>
    <td>{{ $data2 }}</td>
    @if (gettype($data3) == 'string')
        <td>{{ $data3 }}</td>
    @else
        <td>{{ number_format($data3, 0, ',', ',') }} VNĐ</td>
    @endif
    <td>{{ $data4 }}</td>
    @isset($data5)
        <td>
            {{ $data5 }}
        </td>
    @endisset
    @isset($is_user)
        <td class="flex gap-2">
            <a href="{{ route('users.edit', $data1) }}" class="btn text-white  bg-yellow-600">Edit</a>
            <button data-toggle="modal" data-id="{{ $data1 }}" data-target="#confirmModal"
                class="btn text-white bg-red-600 showModalBtn" @if ($data4 === 'Admin') disabled @endif>
                Delete
            </button>
        </td>
    @else
        <td>
            <a href="{{ $detail_url }}" class="btn btn-info">Detail</a>
        </td>
    @endisset

</tr>
