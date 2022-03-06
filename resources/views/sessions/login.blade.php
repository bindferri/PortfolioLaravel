<x-secondary-layout>

    <section class="register login-page">
        <form class="form-contact" method="post" enctype="multipart/form-data" action="/login">
            <h4>Log In</h4>
            @csrf
            <x-form.input name="email" placeholder="Email" type="email"></x-form.input>
            <x-form.input name="password" placeholder="Password" type="password"></x-form.input>
            <input type="submit" class="btn form-contact__btn" value="Log In" name="login">
        </form>
    </section>


</x-secondary-layout>
