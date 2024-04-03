<x-layout>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/post">Todo List</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <a href="{{route('post.create')}}" class="m-auto"><button class="btn btn-outline-success" type="submit">Create new post</button></a>
            <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-outline-danger m-auto" type="submit">Logout</button>
            </form>
            @else
            <a href="/login" class="m-auto"><button class="btn btn-outline-danger" type="submit">Login</button></a>
            <a href="/signup" class="m-auto"><button class="btn btn-outline-primary" type="submit">Sign Up</button></a>
            @endauth
          </div>
        </div>
    </nav>

    @if(session()->has('message'))
    <div class="alert alert-success">
        <p>
         {{session('message')}}
        </p>
    </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">writer</th>
                <th scope="col">date</th>
                <th scope="col">action</th>

            </tr>
        </thead>
        <tbody>
            @php $postId = 0; @endphp
            @auth
            @foreach($posts as $post)
            <tr>
                @php $postId += 1 ; @endphp
                <td>{{$postId}}</td>
                <td>{{$post->title}}</td>
                <td>{{auth()->user()->name}}</td>
                <td>{{$post->started_at}}</td>
                <td><a href="{{route('post.show', $post->id)}}"><button class="btn btn-outline-info" type="submit">Show</button></a></td>
                <td><a href="{{route('post.edit', $post->id)}}"><button class="btn btn-outline-primary" type="submit">Edit</button></a></td>
                <form action="{{route('post.destroy', $post->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <td><a href="/post/delete"><button class="btn btn-outline-danger" type="submit">Delete</button></a></td>
                </form>
            </tr>
            @endforeach
            @endauth
        </tbody>
    </table>

</x-layout>