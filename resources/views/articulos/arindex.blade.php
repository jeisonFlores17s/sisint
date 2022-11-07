@extends('layouts.dashboard')
@section('titulo', 'Articulos')
@section('titulocard', 'Articulos')

@section('content')
@livewire('articulos.index')

@endsection
@section('scripts')
<script type="text/javascript">
    window.livewire.on('actualizarArticulo', () => {
        $('#exampleModaledar').modal('hide');
        $('#modalxl').modal('hide');
    });
</script>

@endsection