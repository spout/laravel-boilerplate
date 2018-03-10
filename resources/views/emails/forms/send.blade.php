<table>
    <tbody>
        @foreach($data as $k => $v)
            <tr>
                <th>{{ $k }}</th>
                <td>{{ implode(', ', (array)$v) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
