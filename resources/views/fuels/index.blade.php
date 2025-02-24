@extends('layout')

@section('content')
<h1>Üzemanyagok</h1>
<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <div id="oksa">
    @include('success')
    </div>
    <ul>
        <div class="col">
            <a href="{{ route('fuels.create')}}"><button>Új hozzáadása</button></a>
        </div>
        <br><br><br>
        
        @foreach($fuels as $fuel)
            <table>
                <tr>
                    <td><div class="col id">{{ $fuel->id }}</div></td>
                    <td><div class="col">{{$fuel->name}}</div></td>
                <td>
                <div class="right">

                        <div class="col">
                            <a href="{{ route('fuels.edit', $fuel->id) }}"><button>Módosít</button></a>
                        </div>
                        <div class="col">
                            <form action="{{ route('fuels.destroy', $fuel->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="btn-del-fuel">Töröl</button>
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
