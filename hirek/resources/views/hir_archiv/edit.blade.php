<form action="/api/hir_archivs/"{{$hir_archiv->id}}>
    {{ csrf_field() }}
    {{method_field('Put')}}
    <select name="hir" id="hir">
        @foreach ($hir_archivs as $hir_archiv )
        <option value="{{$hir_archiv->hir_id}}"
        {{$user->user_id == $hir_archiv->hir ? 'selected' : ''}}
        >{{$hir_archiv->$hir}}
        @endforeach
    </select>
    <input type="datetime" name="csere" placeholder="csere">
    <input type="datetime" name="ervenyesseg" placeholder="ervenyesseg">
    <input type="text" name="cim" placeholder="cim">
    <input type="text" name="tartalom" placeholder="tartalom">

</select>
<input type="submit" value="ok">
</form>