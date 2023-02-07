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
        <div class="col-8 m-auto">


            @if (session('status'))
                <div class="bg-success text-white">
                    {{ session('status') }}
                </div>
            @endif


            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category-name">name</label>
                    <input type="text"
                        class="form-control @error('name')
                is-invalid
                @enderror "
                        id="name" name="name" placeholder="Please Provide Company Name"
                         value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email"
                        class="form-control @error('email')
                is-invalid
                @enderror "
                        id="email" name="email" placeholder="Please Provide email"
                         value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="logo">logo</label>
                    <input type="file"
                        class="form-control @error('logo')
                is-invalid
                @enderror "
                        id="logo" name="logo" placeholder="Please Provide logo Name"
                         value="{{ old('logo') }}">
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="website">website</label>
                    <input type="text"
                        class="form-control @error('website')
                is-invalid
                @enderror "
                        id="website" name="website" placeholder="Please Provide website Name"
                         value="{{ old('website') }}">
                    @error('website')
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
</body>

</html>
