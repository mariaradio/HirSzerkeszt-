@foreach ($hirs as $hir)
    <form action="/api/korlats/{{$hirs->id}}" method="post">
    {{ csrf_field() }}
    {{method_field('Get')}}
    <div class="form-group">
        <input type="submit" value="{{$hir}}">
    </div>
    </form>
@endforeach
