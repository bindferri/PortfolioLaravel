<x-layout>
    <x-admin.navbar></x-admin.navbar>


    <section class="admin-content">
        <h3 class="admin__heading">Skills Customize</h3>

        <div class="container-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
                @csrf
                @method('PATCH')
                <label>Skills Name:</label>
                <x-form.input name="name" value="{{$skill->name}}"></x-form.input>
                <label>Skills Image: </label>
                <p class="update_p">{{$skill->image}}</p>
                <x-form.input name="image" type="file"></x-form.input>
                <input type="submit" value="Create" class="btn form-contact__btn" name="skills_create">
            </form>

        </div>
    </section>
    </div>

</x-layout>
