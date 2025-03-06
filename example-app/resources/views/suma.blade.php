
@extends('layouts.app')

@section('content')
    
    <section>
        <hgroup>
            <h3>Suma de 2 números.</h3>
            <br>
            <form action="/suma"  method="POST">
                @csrf
                <label for="number_1">Número 1</label>
                <input type="number" name="number_1" id="number_1">
                <br>
                <label for="number_2">Número 2</label>
                <input type="number" name="number_2" id="number_2">
                <br>
                <button type="submit">Sumar</button>
            </form>
            <br>
            @if(isset($resultado))
            <h4>Resultado de la suma: {{$resultado}}</h4>
            @endif
        </hgroup>
    </section>
@endsection

