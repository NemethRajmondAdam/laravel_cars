@extends('layout')

@section('content')
<h1>Karosszériák</h1>
<div>
    <a href="{{ route('bodies.create') }}" title="Új"><button><i class="fa fa-plus plus" title="Módosít"></i>Új hozzáadása</button></a> 
    <br><br>
	@foreach($bodies as $body)
		<div class="row {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
			<div class="col id">{{ $body->id }}</div>
			<div class="col">{{$body->name}}</div>
			<div class="right">
				<div class="col"><a href="{{ route('bodies.show', $body->id) }}"><button>BodiesShow</button></a></div>
					<div class="col"><a href="{{ route('bodies.edit', $body->id) }}"><button>Módosit</i></button></a></div>
					<div class="col">
						<form action="{{ route('bodies.destroy', $body->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" name="btn-del-fuel"><i class="fa fa-trash" title="Töröl"></i>Törlés</button>
						</form>
					</div>
			</div>
		</div>
	@endforeach
</div>
@endsection