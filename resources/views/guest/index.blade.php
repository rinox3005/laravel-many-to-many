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
                        <div class="card-body text-center">
                            <img
                                class="card-img"
                                src="{{ $project->preview_path ? asset($project->preview_path) : Vite::asset("resources/img/project-placeholder.png") }}"
                                alt="{{ $project->title }}"
                            />
                            <h2 class="card-title display-6 fw-bold py-3">
                                {{ $project->title }}
                            </h2>
                            <a
                                href="{{ route("projects.show", $project) }}"
                                class="btn btn-primary"
                            >
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
