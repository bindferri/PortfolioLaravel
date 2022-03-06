<x-layout>
    <x-admin.navbar></x-admin.navbar>

    <section class="admin-content">
        <h3 class="admin__heading">Project Customize</h3>

        <div class="container-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
                @csrf
                <label>Project Name:</label>
                <x-form.input name="project_name"></x-form.input>
                <label>Project Excerpt: </label>
                <x-form.input name="project_excerpt"></x-form.input>
                <label>Project Content: </label>
                <textarea name="project_content" id="" cols="30" rows="10"></textarea>
                <label>Main Photo: </label>
                <x-form.input name="project_main_photo" type="file"></x-form.input>
                <label>Second Photo: </label>
                <x-form.input name="project_second_photo" type="file"></x-form.input>
                <label>Third Photo: </label>
                <input type="file" name="project_third_photo">
                <input type="submit" value="Create" class="btn form-contact__btn" name="project_create">
            </form>

            @if($projects->count() > 0)
            <table class="admin-content__table">
                <tr>
                    <th>Project Name</th>
                    <th>Project Excerpt</th>
                    <th>Project Content</th>
                    <th>Main Photo</th>
                    <th>Second Photo</th>
                    <th>Third Photo</th>
                </tr>
                <tr>

                </tr>

                @foreach($projects as $project)
                <tr>
                    <td>{{$project->project_name}}</td>
                    <td>{{\Illuminate\Support\Str::limit($project->project_excerpt,20)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($project->project_content,20)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($project->project_main_photo,20)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($project->project_second_photo,20)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($project->project_third_photo,20)}}</td>
                    <td><a href="/admin/projects/{{$project->id}}">Edit</a></td>
                    <td>
                        <form action="/admin/projects/{{$project->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>
            @endif
        </div>
    </section>
    </div>

</x-layout>
