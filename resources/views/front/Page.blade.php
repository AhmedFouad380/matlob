@extends('front.layout')
@section('title')
    {{$data->title}}
@endsection


@section('content')
    <!-- this is content -->

    <section class="container">
        <div class="row cv-maker">
            <h2>    {{$data->title}}
            </h2>
            <div class="col-md-8">
            {!! $data->description !!}
            </div>
            <div class="col-md-4">
                <img src="{{asset($data->image)}}" class="page-image">
            </div>
        </div>
    </section>
@endsection
