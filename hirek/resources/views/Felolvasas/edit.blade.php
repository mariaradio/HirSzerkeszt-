<form action="/api/Felolvasas/"{{$felolvasas->id}}>
    {{ csrf_field() }}
    {{method_field('Put')}}
    <select name="hir" id="hir">
        @foreach ($felolvasas as $felolvasas )
        <option value="{{$felolvasas->hir_id}}"
        {{$hir->hir_id == $felolvasas->hir ? 'selected' : ''}}
        >{{$hir_archiv->$hir}}
        @endforeach
    </select>
    <select name="felolvaso" id="felolvaso">
        @foreach ($users as $user )
        <option value="{{$user->user_id}}"
        {{$user->id == $hir->user_id ? 'selected' : ''}}
        >{{$user->$user_id}}
        @endforeach
    </select>
    <input type="datetime" name="felolvasas_datuma" placeholder="felolvasas_datuma">
</select>
<input type="submit" value="ok">
</form>