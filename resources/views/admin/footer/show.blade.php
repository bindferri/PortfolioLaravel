<x-layout>
    <x-admin.navbar></x-admin.navbar>

    <section class="admin-content">
        <h3 class="admin__heading">Footer Customize - Maximum 1</h3>

        <div class="container-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
                @csrf
                <label>Footer Text: </label>
                <x-form.input name="text"></x-form.input>
                <label>Facebook Link: </label>
                <x-form.input name="facebook"></x-form.input>
                <label>Instagram Link: </label>
                <x-form.input name="instagram"></x-form.input>
                <label>Github Link: </label>
                <x-form.input name="github"></x-form.input>
                <input type="submit" value="Create" class="btn form-contact__btn" name="footer_create">
                <x-flash></x-flash>
            </form>

            @if($footers->count() > 0)

            <table class="admin-content__table">
                <tr>
                    <th>Footer Text</th>
                    <th>Footer Facebook</th>
                    <th>Footer Instagram</th>
                    <th>Footer Github</th>
                </tr>

                @foreach($footers as $footer)
                <tr>
                    <td>{{$footer->text}}</td>
                    <td>{{$footer->facebook}}</td>
                    <td>{{$footer->instagram}}</td>
                    <td>{{$footer->github}}</td>
                    <td><a href="/admin/footer/{{$footer->id}}">Edit</a></td>
                    <td><x-admin.delete name="footer" id="{{$footer->id}}"></x-admin.delete></td>
                </tr>
                @endforeach

            </table>
            @endif
        </div>

    </section>
    </div>

</x-layout>
