@extends('navbar')

@push('css')
<link rel="stylesheet" href="/css/telas/index.css">
@endpush

@section('content')
@if(session('msg'))
    <p>{{ session('msg')}}</p>
@endif
<div>
    <h1>Varzeacup</h1>
</div>
@endsection
