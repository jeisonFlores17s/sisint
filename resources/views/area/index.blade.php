@extends('layouts.dashboard')
@section('titulo', 'Area')
@section('titulocard', 'Area')
@section('content')

		@livewire('area.index')

@endsection
@section('scripts')
    <script type="text/javascript">
        window.livewire.on('actualizarArea', () => {
            $('#exampleModalll').modal('hide');
            $('#exampleModaleditararea').modal('hide');
        });
    </script>
    @endsection