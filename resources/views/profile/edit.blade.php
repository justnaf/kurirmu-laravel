@extends('layouts.sidebar.admin')

@section('title', 'Profile')

@section('content')

@section('header')
    Profile
@endsection

@section('content')
    <div class="py-12">
        <div class="p-4 card mb-3 border-0 shadow shadow-md">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-4 card mb-3 border-0 shadow shadow-md">
            @include('profile.partials.update-password-form')
        </div>
    </div>
    </div>
@endsection
