<x-layout>
    <section class="single-content">
        <img class="single-content__img--primary" src="/storage/{{$project->project_main_photo}}" alt="">
        <h1>{{$project->project_name}}</h1>
        <p class="single-content__text">{{$project->project_content}}</p>

        <img class="single-content__img" src="/storage/{{$project->project_second_photo}}" alt="">
        <img class="single-content__img" src="/storage/{{$project->project_third_photo}}" alt="">
    </section>
</x-layout>
