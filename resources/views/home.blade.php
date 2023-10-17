<!-- @extends('layouts.app')

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

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection-->

@extends("layouts.master")

@section("contenu")

<div class="row">
    <div class="col p-4" style="position: fixed;">
        <div class="jumbotron ">
            <h1 style="margin-top: -20px; padding-top: 20px;position: relative;top: -50px; " class="display-3">
                BIENVENUE, <strong>{{userFullName()}}</strong></h1>
            <img style="width: 1500px; height: 700px; margin-top: -20px; padding-top: 20px;position: relative;top: -60px; " src="{{ asset('img/fond1.jpg') }}" alt="Image d'accueil">
            <p class="lead"> Gestion des logements au sénégal <span>CHEZ ESPRIT/IMMO</span>
                <hr class="my-4">

            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#">learn more</a>

            </p>
            </p>

            </p>


        </div>

    </div>

</div>

@endsection