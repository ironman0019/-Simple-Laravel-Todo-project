<x-layout>

  <h1>Create new Todo</h1>

  <form action="{{route('post.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">To do:</label> <textarea name="title" cols="150" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary text-center">Submit</button>
    <a href="/" class="btn btn-success text-center">Back</a>

  </form>


</x-layout>