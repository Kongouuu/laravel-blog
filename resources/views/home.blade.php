@extends('main')

@section('title', '| Notice')

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

                    {{ __('You are logged in!') }} & will be redirected in 2 seconds
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(function(){
        window.location="/";
        }, 2000) 
</script>
@endsection
