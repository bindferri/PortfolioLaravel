@props(['name','data'])
    <div class="admin-car__icon">
        <i {{$attributes}}></i>

        <div class="admin-card__text">
            <h3>{{$data}}</h3>
            <span>{{$name}} Created</span>
        </div>
    </div>
