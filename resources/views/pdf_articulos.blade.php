<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<br><br>
<div class="row">
    <a href="{{ route('pdf_articulos',['descargar'=>'pdf']) }}">Descargar PDF</a>

    <br><br>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Detalles</th>
        </tr>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->marca }}</td>
            <td>{{ $producto->referencia }}</td>
        </tr>
        @endforeach
    </table>
</div>