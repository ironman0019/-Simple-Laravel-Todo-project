<x-layout>
    <h1>Login</h1>
    <form action="/login/auth" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" value="{{old('email')}}">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div class="alert alert-danger"><p>{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <div class="alert alert-danger"><p>{{$message}}</p></div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary text-center">Submit</button>
        <a href="{{route('post.index')}}" class="btn btn-success text-center">Back</a>
    </form>
</x-layout>