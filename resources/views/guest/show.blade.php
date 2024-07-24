@extends("layouts.app")

@section("title")
        {{ $project->title }} - Project Details
@endsection

@section("content")
    <div class="container my-4">
        <div class="project-details">
            <h2 class="display-4 fw-semibold mb-4 text-center">
                {{ $project->title }}
            </h2>
            <div class="content">
                <div class="image-container">
                    @if ($project->preview_path)
                        <img
                            src="{{ asset($project->preview_path) }}"
                            alt="{{ $project->title }} Preview"
                        />
                    @else
                        <img
                            src="{{ Vite::asset("resources/img/project-placeholder.png") }}"
                            alt="Placeholder"
                        />
                    @endif
                </div>
                <div class="details">
                    <h4 class="mt-4">Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-2">
                                <strong>Type:</strong>
                                {{ $project->type?->name ?: "No type set" }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong>Technologies:</strong>
                            @if ($project->technologies->isNotEmpty())
                                @foreach ($project->technologies as $technology)
                                    <span class="badge bg-warning text-black">
                                        {{ $technology->name }}
                                    </span>
                                @endforeach
                            @else
                                <span>Not Available</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="description">
                    <h4>Description</h4>
                    <p>{{ $project->description }}</p>
                </div>
                <div class="key-features">
                    <h4>Key Features</h4>
                    <p>{{ $project->key_features }}</p>
                </div>
                <div class="actions">
                    <a
                        href="{{ route("projects") }}"
                        class="btn btn-secondary"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Back to Projects
                    </a>
                    <a
                        href="{{ $project->link_to_website }}"
                        class="btn btn-primary"
                    >
                        <i class="fas fa-external-link-alt"></i>
                        Visit
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
