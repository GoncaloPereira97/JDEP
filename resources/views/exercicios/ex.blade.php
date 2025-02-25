@extends('layouts.master')

@section('content')

@foreach ($cesaeInfo as $info)
<p>{{ $info['name'] }}</p>
<p>{{ $info['address'] }}</p>
<p>{{ $info['email'] }}</p>
@endforeach


@endsection
