<header>
    <?php // define('BASE_URL', '/rsryu/Tutorial/Tutorial 6/');
    ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WD2024</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal"
                            data-bs-target="#register">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('submissions.index') }}">Submission</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href = "details.php">Details</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</header>
