<div class="modal-body">
    <div class="container-fluid">
        <div class="row">
            <img style="display:block; margin-left: auto; margin-right: auto; position:relative"
                src="{{ asset('images/' . $movie->image) }}" alt="" height=200 width=200 />
            <h1 style="text-align:center;  position:relative"> {{ $movie->name }} </h1>
        </div>
        <div class="row">
            <p style="text-align:center; position:relative">Producer: {{ $movie->producer->name }} </p>
        </div>
        <div class="row">
            <div style="text-align:center">
                <p>{{ $movie->plot }}</p>
            </div>
            <div style="display:flex; justify-content:center">
                <ul style="position: relative">Cast:
                    @foreach ($movie->actors as $actor)
                        <li class=".col-md-6" style="position:relative"> {{ $actor->name }} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal-footer">
</div>
