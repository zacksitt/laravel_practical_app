@extends('layout')
@section('content')
    <section class="content">
        <h3>Registration failed!!!</h3>
        <p>{{$message}}</p>
        <a href="/register">Try again</a>
    </section>
@endsection

