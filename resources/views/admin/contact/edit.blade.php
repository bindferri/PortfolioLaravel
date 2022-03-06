<x-layout>
    <x-admin.navbar></x-admin.navbar>

    <section class="admin-content">
        <h3 class="admin__heading">Contact Customize - Maximum 1</h3>

        <div class="container-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
                @csrf
                @method('PATCH')
                <label>Get in Touch Text: </label>
                <x-form.input name="text" value="{{$contact->text}}"></x-form.input>
                <label>Name: </label>
                <x-form.input name="name" value="{{$contact->name}}"></x-form.input>
                <label>Address: </label>
                <x-form.input name="address" value="{{$contact->address}}"></x-form.input>
                <label>Email: </label>
                <x-form.input name="email" type="email" value="{{$contact->email}}"></x-form.input>
                <input type="submit" value="Create" class="btn form-contact__btn" name="contact_create">
            </form>

        </div>
    </section>
    </div>

</x-layout>
