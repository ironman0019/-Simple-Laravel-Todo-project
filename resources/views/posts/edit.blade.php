<x-layout>

    <h1>Edit</h1>

    <form action="{{route('post.update', $post->id)}}" method="post">
      @csrf
      @method('PUT')
        <div class="mb-3">
            <label class="form-label">Todo:</label>
            <textarea name="title" cols="150" rows="5">{{$post->title}}</textarea>
          </div>
        <button type="submit" class="btn btn-primary text-center">Submit</button>
    
    </form>


</x-layout>