@extends("layouts.app")

@section("title")
    Create Type
@endsection

@section("content")
    <div class="container">
        <div class="card my-3">
            <div class="card-header bg-success text-white">
                <h2 class="mb-0">Create Type</h2>
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

                <form action="{{ route("admin.types.store") }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ old("name") }}"
                            required
                        />
                    </div>
                    <a
                        href="{{ route("admin.types.index") }}"
                        class="btn btn-secondary me-1"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Back to Types
                    </a>
                    <button type="submit" class="btn btn-success">
                        Create Type
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
