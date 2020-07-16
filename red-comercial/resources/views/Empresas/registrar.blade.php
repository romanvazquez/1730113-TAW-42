@extends('layouts.layout')

@section('title', 'Registrar empresa')

    @section('content')
        
        <div id="app">
            <registrar-empresa></registrar-empresa>
        </div>
        
        
        <script src="{{ asset('js/app.js') }}" ></script>
        @include('partials/footer')

    @endsection