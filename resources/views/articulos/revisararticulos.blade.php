@extends('layouts.dashboard')
@section('titulo', 'Revisar articulos')
@section('titulocard', 'Articulos')

@section('content')
@livewire('revisararticulos.index')

@endsection
@section('scripts')
<script type="text/javascript">
    window.livewire.on('Revisararticulo', () => {
        $('#exampleModalObserva').modal('hide');
    });
</script>

@endsection