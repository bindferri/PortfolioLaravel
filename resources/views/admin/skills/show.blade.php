<x-layout>
    <x-admin.navbar></x-admin.navbar>


    <section class="admin-content">
        <h3 class="admin__heading">Skills Customize</h3>

        <div class="container-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
                @csrf
                <label>Skills Name:</label>
                <x-form.input name="name"></x-form.input>
                <label>Skills Image: </label>
                <x-form.input name="image" type="file"></x-form.input>
                <input type="submit" value="Create" class="btn form-contact__btn" name="skills_create">
            </form>

            @if($skills->count() > 0)

            <table class="admin-content__table">
                <tr>
                    <th>Skills Name</th>
                    <th>Skills Image</th>
                </tr>

                @foreach($skills as $skill)
                <tr>
                    <td>{{$skill->name}}</td>
                    <td>{{\Illuminate\Support\Str::limit($skill->image,20)}}</td>
                    <td><a href="/admin/skills/{{$skill->id}}">Edit</a></td>
                    <td><x-admin.delete name="skills" id="{{$skill->id}}"></x-admin.delete></td>
                </tr>
                @endforeach

            </table>
            @endif
        </div>
    </section>
    </div>

</x-layout>
