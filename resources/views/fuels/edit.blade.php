@extends('layout')

@section('content')
    <h1>Módosítás</h1>
    <div>
        <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
        @include('error')
        <form action="{{ route('fuels.update', $fuel->id) }}" method="post">
            @csrf
            @method('PATCH')
            <fieldset id="asd">
                <label for="name">Megnevezés</label>
                <input type="text" id="name" name="name" required value="{{ old('name', $fuel->name) }}">
            </fieldset>
            <button type="submit">Ment</button>
            <a href="{{ route('fuels.index') }}"><button>Mégse</button></a>
        </form>
    </div>
@endsection