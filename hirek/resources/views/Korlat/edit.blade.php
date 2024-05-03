<form action="/api/korlats/"{{$hir->id}}>
    {{ csrf_field() }}
    {{method_field('Put')}}
    <input type="text" name="cim" placeholder="cim">
    <select name="admin" id="admin">
        @foreach ($koralts as $korlat )
        <option value="{{$korlat->user_id}}"
        {{$user->user_id == $korlat->admin ? 'selected' : ''}}
        >{{$korlat->$admin}}
        @endforeach
    </select>
    <input type="datetime" name="beallitas_kezdete" placeholder="beallitas_kezdete">
    <input type="number" name="cim_hossza" placeholder="cim_hossza">
    <input type="number" name="tartalom_hossza" placeholder="tartalom_hossza">

</select>
<input type="submit" value="ok">
</form>