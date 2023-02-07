<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/login">Laravel Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('company.create') }}">Create Company</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('company.index') }}">Company</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.create') }}">Create Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.index') }}">Employees</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>
