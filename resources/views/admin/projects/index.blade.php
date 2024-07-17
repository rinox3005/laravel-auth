@extends("layouts.app")

@section("content")
    <div class="container">
        <h1 class="my-3 text-center">My Projects</h1>
        <ul class="list-group mt-4">
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
