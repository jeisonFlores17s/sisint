<table>
    <thead>
    <tr>
        <th>#</th>
        <th>area</th>
        <th>Fecha de creación</th>
    </tr>
    </thead>
    <tbody>
    @foreach($areas as $area)
        <tr>
            <td>{{ $area->id }}</td>
            <td>{{ $area->area }}</td>
            <td>{{ $area->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>