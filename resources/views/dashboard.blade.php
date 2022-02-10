@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 dartpad-nav-theme p-6 rounded-lg">
            <div>
                {{ auth()->user()->name }}'s Dashboard
            </div>
            <div style="height: 16rem; width: auto;">
                <img src="{{ asset(auth()->user()->img_location) }}" alt="image" style="height: 100%; width: 100%; object-fit: contain;">
            </div>
        </div>
    </div>
@endsection