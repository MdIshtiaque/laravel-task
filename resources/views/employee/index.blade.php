<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('include.bootsrap')
    <title>Document</title>
</head>
<body>
    @include('include.navbar')
    <div class="row">
        <div class="col-10 d-flex justify-content-end my-4">
            <a href="{{ route('employee.create') }}" class="btn btn-success">Create Employee</a>
        </div>
        <div class="col-8 m-auto">
            @if (session('status'))
                <div class="bg-success text-white">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $employee->id }}</th>
                            <th scope="row">{{ $employee->first_name }}</th>
                            <th scope="row">{{ $employee->last_name }}</th>
                            <th scope="row">{{ $employee->company->name }}</th>
                            <th scope="row">{{ $employee->email }}</th>
                            <th scope="row">{{ $employee->phone }}</th>

                            <td>
                                <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mx-auto pb-10 w-4/5" >
                {{ $employees->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</body>
</html>
