@extends("layouts.app")

@section("content")
    <div class="container">
        <h1 class="fw-semibold my-4">My Projects</h1>
        <div class="mb-4">
            <a
                href="{{ route("admin.projects.create") }}"
                class="btn btn-success"
            >
                <i class="fas fa-plus"></i>
                Create New Project
            </a>
        </div>
        <ul class="list-group mb-5 mt-3">
            @foreach ($projects as $project)
                <li
                    class="list-group-item d-flex justify-content-between align-items-center"
                >
                    <div>
                        <h6>
                            <strong>ID:</strong>
                            {{ $project->id }} - {{ $project->title }}
                        </h6>
                    </div>
                    <div>
                        <a
                            href="{{ route("admin.projects.show", $project->id) }}"
                            class="btn btn-primary btn-sm"
                        >
                            <i class="fas fa-eye"></i>
                        </a>
                        <a
                            href="{{ route("admin.projects.edit", $project->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            <i class="fas fa-pencil"></i>
                        </a>
                        <form
                            action="{{ route("admin.projects.destroy", $project->id) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
