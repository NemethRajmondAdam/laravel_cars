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
                </div>
                </td>
                </tr>
            </table>
        
        @endforeach
    </ul>
</div>
@endsection
