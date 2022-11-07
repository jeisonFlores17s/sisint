@extends('layouts.dashboard')
@section('titulo', 'Responsables')
@section('titulocard', 'Responsables')

@section('content')
@livewire('responsable.index')

@endsection
@section('scripts')
    <script type="text/javascript">
        window.livewire.on('crearuser', () => {
            $('#modalxl').modal('hide');
            $('#exampleModaeditaruser').modal('hide');
        });
    </script>

@endsection