@extends('layouts.app')
@section('content')
    <div class="jumbotron my-4" id="chiSono">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1>
                        Ciao, sono Francesco
                    </h1>
                    <p>
                        Jr Full-Stack Web-Developer
                    </p>
                    <p>
                        Da sempre sono una persona molto curiosa e appassionata di <strong>Problem Solving</strong> e di
                        tecnologia. Con un background nel mondo dell'audio come fonico, ho affinato le mie capacità nel
                        risolvere problemi complessi e nell'adattarmi a nuove sfide con creatività e determinazione.
                        Nel 2024 ho deciso di dare una <strong>svolta</strong> alla mia vita e ho intrapreso questo
                        fantastico percorso da <strong>Web Developer</strong> che mi ha permesso di apprendere molte skill e
                        di <strong>sviluppare</strong> un'altra grande passione.

                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="skills">

    </div>

    <div class="projects" id="progetti">
        <div class="container my-4">
            <h2 class="my-4">I miei Progetti</h2>
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-4">
                        <div class="card border-0">
                            <img src="{{ $project->cover_image }}" alt="">
                            <h3>{{ $project->title }}</h3>
                            <a class="" href="{{ $project->project_link }}"><i class="fa-brands fa-github"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
