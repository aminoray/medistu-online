@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="">
                      <p>name: {{ Auth::user()->name }}</p>
                      <p>username: {{ Auth::user()->user_id }}</p>
                      <p>e-mail: {{ Auth::user()->email }}</p>
                      <p>status: {{ Auth::user()->status }}</p>
                    </div>
                    <a href="/user/{{ Auth::user()->id }}/edit">
                      <p>編集する</p>
                    </a>
                    <a href="/posts/create">
                      <p>質問する</p>
                    </a>
                    <a href="/posts">
                      <p>質問一覧</p>
                    </a>

                    <!-- {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
