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
                        <button
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            data-bs-project-id="{{ $project->id }}"
                            data-bs-project-title="{{ $project->title }}"
                        >
                            <i class="fas fa-trash-can"></i>
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- Modal -->
    <div
        class="modal fade"
        id="deleteModal"
        tabindex="-1"
        aria-labelledby="deleteModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="fw-semibold">Delete Confirmation:</h5>
                    <p>
                        Are you sure you want to delete
                        <span class="fw-semibold">{{ $project->title }}</span>
                        ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>
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
