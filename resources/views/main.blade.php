{{-- resources/views/home.blade.php --}}
@extends('components.layout')  {{-- Extends your layout to inherit nav and other shared elements --}}

@section('title', 'Home Page')  {{-- Optional: Set a custom page title --}}

@section('content')
    <h1>Welcome to the Home Page</h1>
    <p>This is the content for the home page. The navigation bar is automatically included from the layout.</p>
    {{-- Add more home-specific HTML/content here --}}
@endsection