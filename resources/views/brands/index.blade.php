@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($brands as $brand)
            <div class="col-md-12">
                {{$brand->id}}. {{$brand->title}}
            </div>
            @endforeach
        </div>
    </div>
@endsection
