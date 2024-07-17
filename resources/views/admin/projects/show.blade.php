@extends("layouts.app")

@section("content")
    <div class="container">
        <h1 class="my-4 text-center">Project Details</h1>
        <div class="card mt-4 shadow-sm">
            <div
                class="card-header bg-primary d-flex justify-content-between align-items-center text-white"
            >
                <h2 class="mb-0">{{ $project->title }}</h2>
                <span
                    class="badge @if ($project->status == "Completed")
                        bg-success
                        text-light
                    @elseif ($project->status == "Pending")
                        bg-warning
                        text-dark
                    @endif"
                >
                    {{ $project->status }}
                </span>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>ID:</strong>
                            {{ $project->id }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>Type:</strong>
                            {{ $project->type }}
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>Programming Language:</strong>
                            {{ $project->programming_language }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>Created At:</strong>
                            {{ $project->created_at->format("d M Y, H:i") }}
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a
                        href="{{ route("admin.projects.index") }}"
                        class="btn btn-primary me-2"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Back to Projects
                    </a>
                    <a
                        href="{{ route("admin.projects.edit", $project->id) }}"
                        class="btn btn-warning me-2"
                    >
                        <i class="fas fa-edit"></i>
                        Edit Project
                    </a>
                    <form
                        action="{{ route("admin.projects.destroy", $project->id) }}"
                        method="POST"
                        style="display: inline-block"
                    >
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete Project
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
