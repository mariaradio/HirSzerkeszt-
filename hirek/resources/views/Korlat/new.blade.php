<form action="/api/korlats/"method="post">
    {{ csrf_field() }}
    <input type="text" name="cim" placeholder="cim">
    <select name="admin" id="admin">
        @foreach ($koraltoks as $korlatok )
        <option value="{{$korlatok->user_id}}">
        {{$user->user_id}}</option>
        @endforeach
    </select>
    <input type="datetime" name="beallitas_kezdete" placeholder="beallitas_kezdete">
    <input type="number" name="cim_hossza" placeholder="cim_hossza">
    <input type="number" name="tartalom_hossza" placeholder="tartalom_hossza">
    </select>
    <input type="submit" value="ok">
</form>
