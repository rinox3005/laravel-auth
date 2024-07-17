@extends("layouts.app")

@section("title")
    Project Management Tool
@endsection

@section("content")
    <div class="jumbotron bg-light mb-4 p-5">
        <div class="container py-5 text-center">
            <h1 class="display-5 fw-bold">
                Welcome to My Project Management Tool
            </h1>
            <p class="col-md-8 fs-4 mx-auto">
                Manage your projects efficiently with our tool. Organize, track,
                and collaborate on your projects seamlessly.
            </p>
            <a
                href="{{ route("admin.dashboard") }}"
                class="btn btn-primary btn-lg"
            >
                Get Started
            </a>
        </div>
    </div>

    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="fas fa-tasks fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Organize Projects</h5>
                        <p class="card-text">
                            Keep all your projects organized in one place.
                            Create, edit, and manage your projects effortlessly.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i
                            class="fas fa-chart-line fa-3x text-primary mb-3"
                        ></i>
                        <h5 class="card-title">Track Progress</h5>
                        <p class="card-text">
                            Monitor the progress of your projects with our
                            tracking tools. Stay on top of deadlines and
                            milestones.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Collaborate</h5>
                        <p class="card-text">
                            Work together with your team in real-time. Share
                            updates, communicate, and collaborate on your
                            projects.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
