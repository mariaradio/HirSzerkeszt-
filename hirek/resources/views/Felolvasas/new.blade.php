<form action="/api/Felolvasas/"method="post">
    {{ csrf_field() }}
    <select name="hir" id="hir">
        @foreach ($felolvasas as $felolvasas )
        <option value="{{$felolvasas->hir_id}}">
        {{$hir->hir_id }}</option>
        @endforeach
    </select>
    <select name="felolvaso" id="felolvaso">
        @foreach ($users as $user )
        <option value="{{$user->user_id}}">
        {{$user->id }} </option>
        @endforeach
    </select>
    <input type="datetime" name="felolvasas_datuma" placeholder="felolvasas_datuma">
    </select>
    <input type="submit" value="ok">
</form>
