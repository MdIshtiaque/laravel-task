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
            <a href="{{ route('company.create') }}" class="btn btn-success">Create Company details</a>
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
                        <th scope="col">Company name</th>
                        <th scope="col">Company email</th>
                        <th scope="col">Company logo</th>
                        <th scope="col">Company website</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <th scope="row">{{ $company->id }}</th>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>
                                <img src={{ "/storage/$company->logo"}} width="100" height="100">
                            </td>
                            <td>{{ $company->website}}</td>
                            <td>
                                <a href="{{ route('company.edit', ['company' => $company->id]) }}"
                                    class="btn btn-success">Edit</a>

                                <form action="{{ route('company.destroy', ['company' => $company->id]) }}"
                                    method="POST">
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
                {{ $companies->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</body>

</html>
