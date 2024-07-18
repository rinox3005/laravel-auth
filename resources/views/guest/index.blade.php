@extends("layouts.guest")

@section("title")
    Project Showcase
@endsection

@section("content")
    <div class="container my-5">
        <div class="mb-5 text-center">
            <h1 class="display-5 fw-bold">Project Showcase</h1>
            <p class="col-md-8 fs-4 mx-auto">
                Explore my diverse range of projects. From innovative tech
                solutions to creative endeavors, see what I've been working on.
            </p>
        </div>
        <div class="row justify-content-center">
            @foreach ($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <img
                                class="placeholder-proj img-fluid card-img"
                                src="{{ Vite::asset("resources/img/project-placeholder.png") }}"
                                alt="project-placeholder"
                            />
                            <h4 class="card-title">{{ $project->title }}</h4>
                            <p class="card-text">
                                <strong>Type:</strong>
                                {{ $project->type }}
                            </p>
                            <p>
                                <strong>Programming Language:</strong>
                                {{ $project->programming_language }}
                            </p>
                            <p>
                                <strong>Status:</strong>
                                {{ $project->status }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
