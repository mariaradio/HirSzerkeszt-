<form action="/api/hirs/"method="post">
    {{ csrf_field() }}
    <select name="szerkeszto" id="szerkeszto">
        @foreach ($users as $user )
        <option value="{{$user->user_id}}">
        {{$user->id}}
        </option>
    </select>
    <input type="text" name="cim" placeholder="cim">
    <input type="text" name="tartalom"placeholder="tartalom">
    <input type="datetime" name="letrehozas" placeholder="letrehozas">
    <input type="datetime" name="utolso_szerkesztes" placeholder="utolso_szerkesztes">
    <input type="number" name="felolvasasok_szama"placeholder="felolvasasok_szama">
    <input type="datetime" name="ervenyesseg" placeholder="ervenyesseg">
    </select>
    <input type="submit" value="ok">
</form>
