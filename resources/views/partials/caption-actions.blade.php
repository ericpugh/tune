@if ($caption)
    <div class="col col-1">
        <a class="btn btn-primary" href="/dashboard/captions/{{ $caption->id }}/edit">
            <span class="oi oi-pencil"></span>
        </a>
    </div>
    <div class="col col-1">
        <form action="/dashboard/captions/{{ $caption->id }}" method="post">
            {{ method_field('DELETE') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger" type="submit">
                <span class="oi oi-trash"></span>
            </button>
        </form>
    </div>
    <div class="col col-1">
        <a class="btn btn-info" target="_blank" href="/embed/{{ $caption->id }}">
            <span class="oi oi-code"></span>
        </a>
    </div>
@endif