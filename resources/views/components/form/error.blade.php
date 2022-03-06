@props(['name'])
@error($name)
<p class="register__fail">{{$message}}</p>
@enderror
