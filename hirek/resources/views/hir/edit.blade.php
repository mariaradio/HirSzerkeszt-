<form action="/api/hirs/"{{$hir->id}}>
    {{ csrf_field() }}
    {{method_field('Put')}}
    <input type="text" name="cim" placeholder="cim">
    <select name="szerkeszto" id="szerkeszto">
        @foreach ($users as $user )
        <option value="{{$user->user_id}}"
        {{$user->id == $hir->user_id ? 'selected' : ''}}
        >{{$user->$user_id}}
        @endforeach
    </select>
    <input type="text" name="jelszo" placeholder="jelszo">
    <input type="datetime" name="letrehozas" placeholder="letrehozas">
    <input type="datetime" name="utolso_szerkesztes" placeholder="utolso_szerkesztes">
    <input type="number" name="felolvasasok_szama" placeholder="felolvasasok_szama">
    <input type="datetime" name="ervenyesseg" placeholder="ervenyesseg">

</select>
<input type="submit" value="ok">
</form>