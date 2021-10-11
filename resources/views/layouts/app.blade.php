@extends('layouts.base')

@section('body')
    <div class="flex">
        <div class="w-1/4">
            @livewire('navbar')
        </div>
        <div class="flex-1">
            @yield('content')
            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
        <div class="w-1/6">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint quis est iusto sequi consequatur aperiam molestias modi ipsum consequuntur blanditiis porro numquam quisquam quos aliquam, rem maiores, aliquid magnam veniam!
        </div>
    </div>
@endsection
