@extends("layouts.guest")

@section("title")
    My Projects Showcase
@endsection

@section("content")
    <div class="jumbotron jumbo-bg mb-4 p-5 text-white">
        <div class="position-relative z-2 container py-5 text-center">
            <h1 class="display-5 fw-bold">Welcome to My Projects Showcase</h1>
            <p class="col-md-8 fs-4 mx-auto">
                Explore my diverse range of projects. From innovative tech
                solutions to creative endeavors, see what I've been working on.
            </p>
            <a href="{{ route("projects") }}" class="btn btn-primary btn-lg">
                View All Projects
            </a>
        </div>
    </div>

    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i
                            class="fas fa-laptop-code fa-3x text-primary mb-3"
                        ></i>
                        <h5 class="card-title">Tech Solutions</h5>
                        <p class="card-text">
                            Discover innovative technology projects that aim to
                            solve real-world problems and enhance productivity.
                        </p>
                        <a href="#" class="btn btn-secondary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i
                            class="fas fa-paint-brush fa-3x text-primary mb-3"
                        ></i>
                        <h5 class="card-title">Creative Works</h5>
                        <p class="card-text">
                            Explore a collection of creative projects, from
                            digital art to multimedia installations.
                        </p>
                        <a href="#" class="btn btn-secondary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="fas fa-globe fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Community Initiatives</h5>
                        <p class="card-text">
                            Take a look at projects focused on community
                            development and social impact.
                        </p>
                        <a href="#" class="btn btn-secondary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
