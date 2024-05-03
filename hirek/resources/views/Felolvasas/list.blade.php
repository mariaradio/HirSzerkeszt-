@foreach ($Felolvasas as $Felolvasas)
    <form action="/api/Felolvasas/{{$hir_archivs->id}}" method="post">
    {{ csrf_field() }}
    {{method_field('Get')}}
    <div class="form-group">
        <input type="submit" value="{{$hir_archiv}}">
    </div>
    </form>
@endforeach
