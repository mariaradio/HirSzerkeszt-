@foreach ($hir_archivs as $hir_archiv)
    <form action="/api/hir_archivs/{{$hir_archivs->id}}" method="post">
    {{ csrf_field() }}
    {{method_field('Get')}}
    <div class="form-group">
        <input type="submit" value="{{$hir_archiv}}">
    </div>
    </form>
@endforeach
