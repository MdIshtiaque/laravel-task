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

        <div class="col-10 d-flex justify-content-start my-4">
            <a href="{{ route('employee.index') }}" class="btn btn-success">Goto Sub Category lists</a>
        </div>
        <div class="col-8 m-auto">


            @if (session('status'))
                <div class="bg-success text-white">
                    {{ session('status') }}
                </div>
            @endif




            <form action="{{ route('employee.store') }}" method="POST">
                @csrf


                <div class="form-group">
                    <label for="first_name">first_name</label>
                    <input type="text"
                        class="form-control @error('first_name')
                is-invalid
                @enderror "
                        id="first_namee" name="first_name" placeholder="Please Provide a first Name"
                        value="{{ old('first_name') }}">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="last_name">last_name</label>
                    <input type="text"
                        class="form-control @error('last_name')
                is-invalid
                @enderror "
                        id="last_namee" name="last_name" placeholder="Please Provide a last Name"
                        value="{{ old('last_name') }}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="select">
                    <select class="form-select lg mt-4 mb-4 p-2" name="id">
                        <option selected>Select Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text"
                        class="form-control @error('email')
                is-invalid
                @enderror "
                        id="email" name="email" placeholder="Please Provide a email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text"
                        class="form-control @error('phone')
                is-invalid
                @enderror "
                        id="phone" name="phone" placeholder="Please Provide a phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>
