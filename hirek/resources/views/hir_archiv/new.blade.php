<form action="/api/hir_archivs/"method="post">
    {{ csrf_field() }}
    <select name="hir" id="hir">
        @foreach ($koraltoks as $korlatok )
        <option value="{{$korlatok->user_id}}">
        {{$user->user_id}}
        </option>
        @endforeach
    </select>
    <input type="datetime" name="csere" placeholder="csere">
    <input type="datetime" name="ervenyesseg" placeholder="ervenyesseg">
    <input type="text" name="cim" placeholder="cim">
    <input type="text" name="tartalom" placeholder="tartalom">
    </select>
    <input type="submit" value="ok">
</form>
