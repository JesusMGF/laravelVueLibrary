@extends('layouts.appapi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login with API</div>

                <div class="card-body">
                    <apilogin-component></apilogin-component>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
