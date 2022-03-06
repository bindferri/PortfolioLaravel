@props(['name','id'])
<form action="/admin/{{$name}}/{{$id}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
