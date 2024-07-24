@extends("layouts.app")

@section("title")
    Technologies
@endsection

@section("content")
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-semibold d-inline my-4">Projects Technologies</h1>
            <div class="d-inline">
                <a
                    href="{{ route("admin.technologies.create") }}"
                    class="btn btn-success"
                >
                    <i class="fas fa-plus"></i>
                    Create New Technology
                </a>
            </div>
        </div>

        @if (session("message"))
            <div class="alert alert-success">
                {{ session("message") }}
            </div>
        @endif

        <ul class="list-group mb-5 mt-3">
            @foreach ($technologies as $technology)
                <li
                    class="list-group-item d-flex justify-content-between align-items-center"
                >
                    <h6 class="mb-0">
                        {{ $technology->id }} - {{ $technology->name }}
                    </h6>
                    <div>
                        <a
                            href="{{ route("admin.technologies.show", $technology) }}"
                            class="btn btn-primary btn-sm"
                        >
                            <i class="fas fa-eye"></i>
                        </a>
                        <a
                            href="{{ route("admin.technologies.edit", $technology) }}"
                            class="btn btn-warning btn-sm"
                        >
                            <i class="fas fa-pencil"></i>
                        </a>
                        <button
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $technology->id }}"
                            data-bs-technology-id="{{ $technology->id }}"
                            data-bs-technology-name="{{ $technology->name }}"
                        >
                            <i class="fas fa-trash-can"></i>
                        </button>
                    </div>
                </li>
                <!-- Modal -->
                <div
                    class="modal fade"
                    id="deleteModal{{ $technology->id }}"
                    tabindex="-1"
                    aria-labelledby="deleteModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="fw-semibold">
                                    Delete Confirmation:
                                </h5>
                                <p>
                                    Are you sure you want to delete
                                    <span class="fw-semibold">
                                        {{ $technology->name }}
                                    </span>
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
                                    action="{{ route("admin.technologies.destroy", $technology) }}"
                                    method="POST"
                                    style="display: inline-block"
                                >
                                    @csrf
                                    @method("DELETE")
                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                    >
                                        <i class="fas fa-trash"></i>
                                        Delete Technology
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
@endsection
