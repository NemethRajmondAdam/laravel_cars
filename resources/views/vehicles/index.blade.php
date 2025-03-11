@extends('layout')

@section('content')
<h1>Járművek</h1>
<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <div id="oksa">
    @include('success')
    </div>
    <ul>
        <div class="col">
            <a href="{{ route('vehicles.create')}}"><button>Új hozzáadása</button></a>
        </div>
        <br><br><br>
        
        @foreach($vehicles as $vehicle)
        
            <table>
                <tr>
                    <td><div class="col id">{{ $vehicle->id }}</div></td>
                    <td><div class="col">{{$vehicle->license_plate}}</div></td>
                    <td><div class="col">{{$vehicle->VIN}}</div></td>
                <td><div class="col">
                        @foreach($makers as $maker)
                            @if($maker->id == $vehicle->maker_id)
                                {{ $maker->name }}
                            @endif
                        @endforeach
                    </div></td>
                    <td><div class="col">
                        @foreach($models as $model)
                            @if($model->id == $vehicle->model_id)
                                {{ $model->name }}
                            @endif
                        @endforeach
                    </div></td>
                    <td><div class="col">
                        @foreach($bodies as $body)
                            @if($body->id == $vehicle->body_id)
                                {{ $body->name }}
                            @endif
                        @endforeach
                    </div></td>
                        <td><div class="col">
                        @foreach($fuels as $fuel)
                            @if($fuel->id == $vehicle->fuel_id)
                                {{ $fuel->name }}
                            @endif
                        @endforeach
                    </div></td>
                    <td>                
                        <div class="right">

                        <div class="col">
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}"><button>Módosít</button></a>
                        </div>
                        <div class="col">
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btn-del-vehicle">Töröl</button>
                            </form>
                        </div>
                        </div></td>

                </td>
                </tr>
            </table>
        
        @endforeach
    </ul>
</div>
@endsection
