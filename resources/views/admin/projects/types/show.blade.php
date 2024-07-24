@extends("layouts.app")

@section("title")
    Type Details
@endsection

@section("content")
    <div class="container">
        <h1 class="my-4 text-center">Type Details</h1>

        @if (session("message"))
            <div class="alert alert-success">
                {{ session("message") }}
            </div>
        @endif

        <div class="card mt-4 shadow-sm">
            <div
                class="card-header bg-primary d-flex justify-content-between align-items-center text-white"
            >
                <h2 class="mb-0">{{ $type->name }}</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-9">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p class="mb-2">
                                    <strong>ID:</strong>
                                    {{ $type->id }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">
                                    <strong>Slug:</strong>
                                    {{ $type->slug }}
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-2">
                                    <strong>Created At:</strong>
                                    {{ $type->created_at->format("d M Y, H:i") }}
                                </p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-2">
                                    <strong>Updated At:</strong>
                                    {{ $type->updated_at->format("d M Y, H:i") }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a
                        href="{{ route("admin.types.index") }}"
                        class="btn btn-primary me-2"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Back to Types
                    </a>
                    <a
                        href="{{ route("admin.types.edit", $type) }}"
                        class="btn btn-warning me-2"
                    >
                        <i class="fas fa-edit"></i>
                        Edit Type
                    </a>
                    <button
                        class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        data-bs-type-id="{{ $type->id }}"
                        data-bs-type-name="{{ $type->name }}"
                    >
                        <i class="fas fa-trash"></i>
                        Delete Type
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
                        <span class="fw-semibold">{{ $type->name }}</span>
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
                        action="{{ route("admin.types.destroy", $type) }}"
                        method="POST"
                        style="display: inline-block"
                    >
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete Type
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
