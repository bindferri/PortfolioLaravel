<x-layout>
    <x-admin.navbar></x-admin.navbar>

    <section class="admin-content">
        <h3 class="admin__heading">Footer Customize - Maximum 1</h3>

        <div class="container-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
                @csrf
                @method('PATCH')
                <label>Footer Text: </label>
                <x-form.input name="text" value="{{$footer->text}}"></x-form.input>
                <label>Facebook Link: </label>
                <x-form.input name="facebook" value="{{$footer->facebook}}"></x-form.input>
                <label>Instagram Link: </label>
                <x-form.input name="instagram" value="{{$footer->instagram}}"></x-form.input>
                <label>Github Link: </label>
                <x-form.input name="github" value="{{$footer->github}}"></x-form.input>
                <input type="submit" value="Create" class="btn form-contact__btn" name="footer_create">
            </form>

        </div>

    </section>
    </div>

</x-layout>
