<x-layout>
    <x-admin.navbar></x-admin.navbar>



    <section class="admin-content">
        <h3 class="admin__heading">{{$hero->hero_text}}</h3>

        <div class="container-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
                @csrf
                @method('PATCH')
                <label>Hero Text:</label>
                <x-form.input name="hero_text" value="{{$hero->hero_text}}"></x-form.input>
                <label>Hero Button Text: </label>
                <x-form.input name="hero_button_text" value="{{$hero->hero_button_text}}"></x-form.input>
                <label>CV File</label>
                <p class="update_p">{{$hero->hero_cv}}</p>
                <x-form.input name="hero_cv" type="file"></x-form.input>
                <label>Your Photo:</label>
                <p class="update_p">{{$hero->hero_photo}}</p>
                <x-form.input name="hero_photo" type="file"></x-form.input>
                <input type="submit" value="Update" class="btn form-contact__btn" name="hero_create">
            </form>

        </div>
    </section>
    </div>

</x-layout>
