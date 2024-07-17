@extends("layouts.app")

@section("content")
    <div class="container">
        <h1 class="my-4 text-center">Create New Project</h1>
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">New Project</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    action="{{ route("admin.projects.store") }}"
                    method="POST"
                >
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ old("title") }}"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select
                            class="form-control"
                            id="type"
                            name="type"
                            required
                        >
                            @foreach ($types as $type)
                                <option
                                    value="{{ $type }}"
                                    {{ old("type") == $type ? "selected" : "" }}
                                >
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="programming_language" class="form-label">
                            Programming Language
                        </label>
                        <select
                            class="form-control"
                            id="programming_language"
                            name="programming_language"
                            required
                        >
                            @foreach ($programmingLanguages as $language)
                                <option
                                    value="{{ $language }}"
                                    {{ old("programming_language") == $language ? "selected" : "" }}
                                >
                                    {{ $language }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select
                            class="form-control"
                            id="status"
                            name="status"
                            required
                        >
                            @foreach ($statuses as $status)
                                <option
                                    value="{{ $status }}"
                                    {{ old("status") == $status ? "selected" : "" }}
                                >
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Create Project
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
