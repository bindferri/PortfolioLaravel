<x-secondary-layout>
<section class="register">
    <form class="form-contact form-register" action="" method="post" enctype="multipart/form-data">
        @csrf
        <h4>Register</h4>
        <x-form.input name="username" placeholder="Username"></x-form.input>
        <x-form.input name="name" placeholder="Name"></x-form.input>
        <x-form.input name="surname" placeholder="Surname"></x-form.input>
        <x-form.input name="email" placeholder="Email" type="email"></x-form.input>
        <x-form.input name="password" placeholder="Password" type="password"></x-form.input>
        <input type="submit" class="btn form-contact__btn" value="Create" name="create_user">
    </form>
</section>
</x-secondary-layout>
