<x-layout>

<section class="hero">
    <div class="hero__text">
        <h5 class="hero__text--heading">{!! isset($hero->hero_text) ? $hero->hero_text : "" !!}</h5>
        <div class="hero__buttons">
            <a class="btn hero__link" href="#projects">{{isset($hero->hero_button_text) ? $hero->hero_button_text : ''}}</a>
            <a href="/storage/{{isset($hero->hero_cv) ? $hero->hero_cv : ''}}" download="CV"><button class="btn hero__link">Download CV</button></a>
        </div>
    </div>
    <picture class="hero__picture">
        <!--        <source type="image/webp" srcset="img/hero.webp">-->
        <!--        <source type="image/jpg" srcset="img/hero.jpg">-->
        <img class="hero__img" src="/storage/{{isset($hero) ? $hero->hero_photo : ''}}" alt="">
    </picture>
</section>

<section class="projects1" id="projects">

    <h2 class="section__header">Projects</h2>
    @php
    $projectCount = 1;
    @endphp
    @if(isset($projects))
    @foreach($projects as $project)
        @if($projectCount % 2 != 0)
    <div class="projects2">
        <img class="projects2__img" src="/storage/{{$project->project_main_photo}}" alt="">
        <div class="projects2__content">
            <h5 class="projects__heading">{{$project->project_name}}</h5>
            <p>{{$project->project_excerpt}}</p>
            <a href="/project/{{$project->id}}" class="orange">Read More...</a>
        </div>
    </div>
            @php
            $projectCount++;
            @endphp
        @else

        <div class="projects2 reverse">
            <div class="projects2__content">
                <h5 class="projects__heading">{{$project->project_name}}</h5>
                <p>{{$project->project_excerpt}}</p>

                <a href="/project/{{$project->id}}" class="aqua">Read More...</a>
            </div>
            <img class="projects2__img" src="/storage/{{$project->project_main_photo}}" alt="">
        </div>
            @php
                $projectCount++;
            @endphp
        @endif
    @endforeach
    @endif




</section>

<section class="knowledge" id="about-me">
    <h2 class="section__header">Skills</h2>
    @php
    $skillCount = 0;
    @endphp
    @if(isset($skills))
    @foreach($skills as $skill)
        @if($skillCount % 3 === 0)
    <div class="languages">
        @endif
        <img src="/storage/{{$skill->image}}" alt="">
        @php $skillCount++ @endphp
        @if($skillCount % 3 === 0)
    </div>
        @endif
    @endforeach
    @endif
</section>

<section class="contact" id="contact">
    <h2 class="contact__heading">Contact Me</h2>
    <p class="contact__heading--p">&#8212;<span class="contact-p__color">get in touch</span>&#8212;</p>

    <div class="contact-form">
        <div class="contact-info">
            <div class="contact-info__text">
                <h4>Get in Touch</h4>
                <p>{{isset($contact) ? $contact->text : ''}}</p>
            </div>

            <div class="contact-info__info">
                <i class="fas fa-user-alt"></i>
                <div class="contact-info__card">
                    <h5>Name</h5>
                    <p>{{isset($contact) ? $contact->name : ''}}</p>
                </div>
            </div>

            <div class="contact-info__info">
                <i class="fas fa-map-marker-alt"></i>
                <div class="contact-info__card">
                    <h5>Address</h5>
                    <p>{{isset($contact) ? $contact->address : ''}}</p>
                </div>
            </div>

            <div class="contact-info__info">
                <i class="fas fa-envelope"></i>
                <div class="contact-info__card">
                    <h5>Email</h5>
                    <p>{{isset($contact) ? $contact->email : ''}}</p>
                </div>
            </div>
        </div>

        <form class="form-contact" method="post" action="">
            <h4>Message me</h4>
            <div class="contact-input">
                <input type="text" name="contact_name" placeholder="Name">
                <input type="email" name="contact_email" placeholder="Email">
            </div>
            <input type="text" name="contact_subject" placeholder="Subject">
            <textarea name="contact_message" id="" cols="30" rows="10" placeholder="Message"></textarea>
            <button class="btn form-contact__btn">Send Message</button>
        </form>
    </div>
</section>
</x-layout>



