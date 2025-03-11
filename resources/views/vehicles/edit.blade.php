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
                <br><br>
            
            
            <label for="maker_id">Gyártó</label>
            <select name="maker_id" id="select-maker" title="Gyártók">
                @foreach($makers as $maker)
                    <option value="{{ $maker->id }}" {{ old('maker_id', $vehicle->maker_id) == $maker->id ? 'selected' : '' }}>{{ $maker->name }}</option>
                @endforeach		
            </select><br><br>
            <label for="model_id">Model</label>
            <select name="model_id" id="select-model"  title="Modellek">
                @foreach($models as $model)
                    <option value="{{ $model->id }}" {{ old('model_id', $vehicle->model_id) == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                @endforeach	
            </select><br><br>
            <label for="body_id">Karosszeria</label>
            <select name="body_id" id="select-body"  title="Karosszeriák">
                @foreach($bodies as $body)
                    <option value="{{ $body->id }}" {{ old('body_id', $vehicle->body_id) == $body->id ? 'selected' : '' }}>{{ $body->name }}</option>
                @endforeach	
            </select><br><br>
            <label for="fuel_id">Üzemanyag</label>
            <select name="fuel_id" id="select-fuel"  title="Üzemanyagok">
                @foreach($fuels as $fuel)
                    <option value="{{ $fuel->id }}" {{ old('fuel_id', $vehicle->fuel_id) == $fuel->id ? 'selected' : '' }}>{{ $fuel->name }}</option>  
                @endforeach	
            </select><br><br>
            <button type="submit">Ment</button>
            <a href="{{ route('vehicles.index') }}"><button>Mégse</button></a>
            </fieldset>
        </form>
    </div>
@endsection