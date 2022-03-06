<x-layout>
    <x-admin.navbar></x-admin.navbar>

    <section class="admin-content">
        <h3 class="admin__heading">Contact Customize - Maximum 1 </h3>

        <div class="container-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
                @csrf
                <label>Get in Touch Text: </label>
                <x-form.input name="text"></x-form.input>
                <label>Name: </label>
                <x-form.input name="name"></x-form.input>
                <label>Address: </label>
                <x-form.input name="address"></x-form.input>
                <label>Email: </label>
                <x-form.input name="email" type="email"></x-form.input>
                <input type="submit" value="Create" class="btn form-contact__btn" name="contact_create">
                <x-flash></x-flash>
            </form>

            @if($contacts->count() > 0)
            <div>
                <table class="admin-content__table">
                    <tr>
                        <th>Contact Text</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                    </tr>

                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->text}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->address}}</td>
                        <td>{{$contact->email}}</td>
                        <td><a href="/admin/contact/{{$contact->id}}">Edit</a></td>
                        <td><x-admin.delete name="contact" id="{{$contact->id}}"></x-admin.delete></td>
                    </tr>
                    @endforeach

                </table>
            </div>
            @endif
        </div>
    </section>
    </div>

</x-layout>
