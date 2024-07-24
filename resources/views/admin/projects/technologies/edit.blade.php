@extends("layouts.app")

@section("title")
    Edit Technology
@endsection

@section("content")
    <div class="container">
        <div class="card my-3">
            <div class="card-header bg-warning text-dark">
                <h2 class="mb-0">Edit Technology</h2>
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
                    action="{{ route("admin.technologies.update", $technology) }}"
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
                            value="{{ old("name", $technology->name) }}"
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
                            value="{{ old("slug", $technology->slug) }}"
                            required
                        />
                    </div>
                    <a
                        href="{{ route("admin.technologies.index") }}"
                        class="btn btn-warning me-1"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Back to Technologies
                    </a>
                    <button type="submit" class="btn btn-warning">
                        Update Technology
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
