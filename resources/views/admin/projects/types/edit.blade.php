@extends("layouts.app")

@section("title")
    Edit Type
@endsection

@section("content")
    <div class="container">
        <div class="card my-3">
            <div class="card-header bg-warning text-dark">
                <h2 class="mb-0">Edit Type</h2>
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
                    action="{{ route("admin.types.update", $type) }}"
                    method="POST"
                >
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ old("name", $type->name) }}"
                            required
                        />
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input
                            type="text"
                            class="form-control"
                            id="slug"
                            name="slug"
                            value="{{ old("slug", $type->slug) }}"
                            required
                        />
                    </div>
                    <a
                        href="{{ route("admin.types.index") }}"
                        class="btn btn-warning me-1"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Back to Types
                    </a>
                    <button type="submit" class="btn btn-warning">
                        Update Type
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
