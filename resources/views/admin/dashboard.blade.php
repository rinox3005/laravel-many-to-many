@extends("layouts.app")

@section("title")
    Dashboard - {{ Auth::user()->name }}
@endsection

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-2 mt-4">
                <div class="list-group">
                    <a
                        href="#"
                        class="list-group-item list-group-item-action active fw-semibold fs-4"
                    >
                        Dashboard
                    </a>
                    <a
                        href="#projectSubmenu"
                        class="list-group-item list-group-item-action"
                        data-bs-toggle="collapse"
                        aria-expanded="false"
                        id="projectSubmenuToggle"
                    >
                        <div
                            class="d-flex align-items-center justify-content-between fw-semibold"
                        >
                            Projects
                            <i
                                class="fas fa-angle-down submenu-icon"
                                id="submenuIcon"
                            ></i>
                        </div>
                    </a>
                    <div class="collapse" id="projectSubmenu">
                        <a
                            href="{{ route("admin.projects.index") }}"
                            class="list-group-item list-group-item-action text-dark"
                        >
                            All Projects
                        </a>
                        <a
                            href="{{ route("admin.types.index") }}"
                            class="list-group-item list-group-item-action text-dark"
                        >
                            Types
                        </a>
                        <a
                            href="{{ route("admin.technologies.index") }}"
                            class="list-group-item list-group-item-action text-dark"
                        >
                            Technologies
                        </a>
                    </div>

                    <a
                        href="#"
                        class="list-group-item list-group-item-action fw-semibold"
                    >
                        Profile
                    </a>
                    <a
                        href="#"
                        class="list-group-item list-group-item-action fw-semibold"
                    >
                        Settings
                    </a>
                </div>
            </div>
            <div class="col-10 mt-4">
                <div class="card">
                    <div class="card-body">
                        @if (session("status"))
                            <div class="alert alert-success" role="alert">
                                {{ session("status") }}
                            </div>
                        @endif

                        <h5>{{ __("You are logged in!") }}</h5>

                        <!-- Quick Stats -->
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="card bg-primary mb-3 text-white">
                                    <div class="card-header">
                                        Total Projects
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $totalProjects }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success mb-3 text-white">
                                    <div class="card-header">
                                        Completed Projects
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $completedProjects }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-warning mb-3 text-white">
                                    <div class="card-header">
                                        Projects In Progress
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $inProgressProjects }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-info mb-3 text-white">
                                    <div class="card-header">
                                        Front-End Projects
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $FrontEndProjects }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-danger mb-3 text-white">
                                    <div class="card-header">
                                        Back-End Projects
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $BackEndProjects }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-dark mb-3 text-white">
                                    <div class="card-header">
                                        Full-Stack Projects
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ $FullStackProjects }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
