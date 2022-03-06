<x-layout>
    <x-admin.navbar></x-admin.navbar>

    <section class="admin-content">
        <h3 class="admin__heading">Project Customize</h3>

        <div class="container-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-contact form--hero">
                @csrf
                @method('PATCH')
                <label>Project Name:</label>
                <x-form.input name="project_name" value="{{$project->project_name}}"></x-form.input>
                <label>Project Excerpt: </label>
                <x-form.input name="project_excerpt" value="{{$project->project_excerpt}}"></x-form.input>
                <label>Project Content: </label>
                <textarea name="project_content" id="" cols="30" rows="10">{{$project->project_content}}</textarea>
                <label>Main Photo: </label>
                <p class="update_p">{{$project->project_main_photo}}</p>
                <x-form.input name="project_main_photo" type="file"></x-form.input>
                <label>Second Photo: </label>
                <p class="update_p">{{$project->project_second_photo}}</p>
                <x-form.input name="project_second_photo" type="file"></x-form.input>
                <label>Third Photo: </label>
                <p class="update_p">{{$project->project_third_photo}}</p>
                <input type="file" name="project_third_photo">
                <input type="submit" value="Update" class="btn form-contact__btn" name="project_create">
            </form>
        </div>
    </section>
    </div>

</x-layout>
