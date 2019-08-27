@extends('layouts.app')

@section('title', 'Creating Quotes')

@section('content')
<div class="container">
    @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('msg'))
        <div class="alert alert-danger">
            <p> {{ session('msg') }} </p>
        </div>
    @endif

    <form method="POST" action="/quotes">
        <div class="form-group">
            <label for="title">Judul</label>
            <input id="text" class="form-control" type="text" name="title" value="{{ old('title') }}"
                placeholder="Tulis judul di sini">
        </div>

        <div class="form-group">
            <label for="subject">Isi Kutipan</label>
            <textarea name="subject" class="form-control" id="" cols="30" rows="10">{{ old('subject') }}</textarea>
        </div>

        {{ csrf_field() }}

        <button type="submit" class="btn btn-default btn-block">Submit Kutipan</button>
    </form>

    <p><a href="/home" class="btn btn-primary">Ga jadi hehe</a></p>
</div>
@endsection
