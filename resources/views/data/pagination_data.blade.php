@foreach($cities as $row)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $row->name }}</td>
    <td>{{ $row->country->name }}</td>
</tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {!! $cities->links() !!}
    </td>
</tr>
