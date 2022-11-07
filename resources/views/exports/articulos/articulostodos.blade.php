<table>
    <thead>
    <tr>
  			<td># </td>
            <td>fechaadquisicion </td>
            <td>marca </td>
            <td> modelo</td>
            <td>serie </td>
            <td>codigo </td>
            <td>folio/comprobante </td>
            <td>estado </td>
            <td>costo de adquisición </td>
            <td>area </td>
            <td>descripcion </td>
            <td>observaciones </td>
            <td>estatus </td>
            <td>Encargado </td>
            <td>Fecha de creación del producto</td>
    </tr>
    </thead>
    <tbody>
    @foreach($articulos as $articulo)
        <tr>
<td>{{ $articulo->id }}</td>
<td>{{ $articulo->fechaadquisicion }}</td>
<td>{{ $articulo->marca }}</td>
<td>{{ $articulo->modelo }}</td>
<td>{{ $articulo->serie}}</td>
<td>{{ $articulo->codigo }}</td>
<td>{{ $articulo->foliocomprobante }}</td>
<td>{{ $articulo->estado }}</td>
<td>{{ $articulo->costodeadquisicion }}</td>
<td>{{ $articulo->area }}</td>
<td>{{ $articulo->descripcion }}</td>
<td>{{ $articulo->observaciones }}</td>
<td>{{ $articulo->estatus }}</td>
<td>{{ $articulo->name }}</td>
<td>{{ $articulo->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>