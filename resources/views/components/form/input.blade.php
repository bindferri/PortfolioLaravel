@props(['name','type' => 'text'])
<input type="{{$type}}" name="{{$name}}" {{$attributes}}>
<x-form.error name="{{$name}}"></x-form.error>
