<x-layout>
    <h1>Sign Up</h1>
    <form action="/signup" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger"><p>{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}">
            @error('email')
            <div class="alert alert-danger"><p>{{$message}}</p></div>
            @enderror
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <div class="alert alert-danger"><p>{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control">
            @error('password_confirmation')
            <div class="alert alert-danger"><p>{{$message}}</p></div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary text-center">Submit</button>
        <a href="/" class="btn btn-success text-center">Back</a>
    </form>
</x-layout>