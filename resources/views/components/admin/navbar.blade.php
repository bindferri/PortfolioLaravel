<div class="container">
    <section class="menu">
        <div class="items">
            <ul>
                <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}"><i class="fas fa-chart-pie"></i>Dashboard</a>
                <a href="/admin/hero" class="{{ request()->is('admin/hero*') ? 'active' : '' }}"><i class="fas fa-home" ></i>Hero</a>
                <a href="/admin/projects" class="{{ request()->is('admin/projects*') ? 'active' : '' }}"><i class="far fa-file-chart-pie"></i>Projects</a>
                <a href="/admin/contact" class="{{ request()->is('admin/contact*') ? 'active' : '' }}"><i class="fas fas fa-address-book"></i>Contact</a>
                <a href="/admin/footer" class="{{ request()->is('admin/footer*') ? 'active' : '' }}"><i class="fas fas fa-address-book"></i>Footer</a>
                <a href="/admin/skills" class="{{ request()->is('admin/skills*') ? 'active' : '' }}"><i class="fas fa-language"></i>Skills</a>
            </ul>
        </div>
    </section>
