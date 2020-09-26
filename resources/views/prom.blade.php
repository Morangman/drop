@extends('layouts.app')

@section('content')
    @yield('header', View::make('header', ['settings' => $settings]))
    <div class="content">
        <section class="prom-prices">
            <div class="container">
            @foreach($files as $file)
                <a class="form-control" href="{{ $file['url'] }}">{{ $file['title'] }}</a>
            @endforeach
            </div>
        </section>
    </div>
    @yield('footer', View::make('footer', ['settings' => $settings, 'content' => $content]))
@endsection
