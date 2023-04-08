@extends('master.home')

@section('main')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form action="" method="POST" role="form">
                    @csrf
                    <legend>Form đăng nhập</legend>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" name="email" placeholder="Nhập email">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập password">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
@endsection
