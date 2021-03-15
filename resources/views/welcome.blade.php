@extends('layouts.app')
@section('content')

    <div class="tm-sidebar-left">
        <livewire:tags/>
    </div>

    <div class="tm-main">
        @include('components.slider.slider')
        <livewire:articles/>
    </div>

{{--    <div class="tm-sidebar-left">--}}
{{--        <livewire:tags/>--}}
{{--    </div>--}}

@endsection
