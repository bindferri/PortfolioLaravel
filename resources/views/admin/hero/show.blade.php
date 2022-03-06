<x-layout>
<x-admin.navbar></x-admin.navbar>



<section class="admin-content">
    <h3 class="admin__heading">Hero Customize - Maximum 1</h3>

    <div class="container-content">
        <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
            @csrf
            <label>Hero Text:</label>
            <x-form.input name="hero_text" value="{{old('hero_text')}}"></x-form.input>
            <label>Hero Button Text: </label>
            <x-form.input name="hero_button_text" value="{{old('hero_button_text')}}"></x-form.input>
            <label>CV File</label>
            <x-form.input name="hero_cv" type="file" value="{{old('hero_cv')}}"></x-form.input>
            <label>Your Photo:</label>
            <x-form.input name="hero_photo" type="file" value="{{old('hero_photo')}}"></x-form.input>
            <input type="submit" value="Create" class="btn form-contact__btn" name="hero_create">
            <x-flash></x-flash>
        </form>

        @if($heros->count() > 0)

        <table class="admin-content__table">
            <tr>
                <th>Hero Text</th>
                <th>Hero Button Text</th>
                <th>CV File</th>
                <th>Photo</th>
            </tr>


            @foreach($heros as $hero)
            <tr>
                <td>{{$hero->hero_text}}</td>
                <td>{{$hero->hero_button_text}}</td>
                <td>{{ \Illuminate\Support\Str::limit($hero->hero_cv,20) }}</td>
                <td>{{\Illuminate\Support\Str::limit($hero->hero_photo,20)}}</td>
                <td><a href="/admin/hero/{{$hero->id}}">Edit</a></td>
                <td>
                    <x-admin.delete name="hero" id="{{$hero->id}}"></x-admin.delete>
                </td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</section>
</div>

</x-layout>
