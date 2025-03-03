@extends('layout')

@section('content')
    <h1>Módosítás</h1>
    <div>
        <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
        @include('error')
        <form action="{{ route('vehicles.update', $vehicle->id) }}" method="post">
            @csrf
            @method('PATCH')
            <fieldset id="asd">
                <label for="VIN">Alvázszám</label>
                <input type="text" id="VIN" name="VIN" required value="{{ old('VIN', $vehicle->VIN) }}"><br>
                <label for="license_plate">Rendszám</label>
                <input type="text" id="license_plate" name="license_plate" required value="{{ old('license_plate', $vehicle->license_plate) }}">
            </fieldset>
            <button type="submit">Ment</button>
            <a href="{{ route('vehicles.index') }}"><button>Mégse</button></a>
        </form>
    </div>
@endsection