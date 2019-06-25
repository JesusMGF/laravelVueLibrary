@extends('layouts.appapi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <apinav-component></apinav-component>
            <div class="card">
                <listcategoriesapi-component></listcategoriesapi-component>
            </div>
        </div>
    </div>
</div>

@endsection