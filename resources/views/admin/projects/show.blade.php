@extends("layouts.app")

@section("title")
    Project Details
@endsection

@section("content")
    <div class="container">
        <h1 class="my-4 text-center">Project Details</h1>

        @if (session("message"))
            <div class="alert alert-success">
                {{ session("message") }}
            </div>
        @endif

        <div class="card mt-4 shadow-sm">
            <div
                class="card-header bg-primary d-flex justify-content-between align-items-center text-white"
            >
                <h2 class="mb-0">{{ $project->title }}</h2>
                <span
                    class="badge @if ($project->status == 'Completed') bg-success @elseif ($project->status == 'In Progress') bg-warning text-dark @endif"
                >
                    {{ $project->status }}
                </span>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-9">
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
                                    {{ $project->type?->name ?: "No type set" }}
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Technologies:</strong>
                                @if ($project->technologies->isNotEmpty())
                                    @foreach ($project->technologies as $technology)
                                        <span
                                            class="badge bg-warning text-black"
                                        >
                                            {{ $technology->name }}
                                        </span>
                                    @endforeach
                                @else
                                    <span>Not Available</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">
                                    <strong>Created At:</strong>
                                    {{ $project->created_at->format("d M Y, H:i") }}
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-2">
                                    <strong>Description:</strong>
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-2">
                                    <strong>Key Features:</strong>
                                    {{ $project->key_features }}
                                </p>
                            </div>
                        </div>
                        @if ($project->link_to_website)
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-2">
                                        <strong>Website:</strong>
                                        <a
                                            href="{{ $project->link_to_website }}"
                                            target="_blank"
                                        >
                                            {{ $project->link_to_website }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-3 text-center">
                        <img
                            src="{{ $project->preview_path ? asset($project->preview_path) : Vite::asset("resources/img/project-placeholder-show.png") }}"
                            alt="{{ $project->title }} Preview"
                            class="img-thumbnail preview-show"
                        />
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
                        href="{{ route("admin.projects.edit", $project) }}"
                        class="btn btn-warning me-2"
                    >
                        <i class="fas fa-edit"></i>
                        Edit Project
                    </a>
                    <button
                        class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        data-bs-project-id="{{ $project->id }}"
                        data-bs-project-title="{{ $project->title }}"
                    >
                        <i class="fas fa-trash"></i>
                        Delete Project
                    </button>
                </div>
            </div>
        </div>
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
                        action="{{ route("admin.projects.destroy", $project) }}"
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
