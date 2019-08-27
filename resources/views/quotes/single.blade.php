@extends('layouts.app')

@section('title', strval($quote->title))

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">{{ $quote->title }}</h1>
        <p class="lead">{{ $quote->subject }}</p>
        <p>Ditulis oleh : {{ $quote->user->name }} </p>

        <p><a href="/quotes" class="btn btn-primary btn-lg">Kembali ke daftar</a></p>

        @if ($quote->userIsOwner())
            <p><a href="/quotes/{{ $quote->id }}/edit" class="btn btn-primary btn-lg">Edit</a></p>
            <form method="POST" action="/quotes/{{ $quote->id }}">
                <button type="submit" class="btn btn-danger">Hapus Kutipan</button>
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
            </form>
        @endif

    </div>

</div>
@endsection
