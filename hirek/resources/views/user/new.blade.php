<form action="/api/users/"method="post">
    {{ csrf_field() }}
    <input type="text" name="felhasznalonév" placeholder="felhasznalonév">
    <input type="text" name="password" placeholder="password">
    <input type="text" name="email" placeholder="email">
    <input type="bit" name="admin" placeholder="admin">
    <input type="bit" name="olvaso" placeholder="olvaso">
    <input type="bit" name="szerkesztő" placeholder="szerkesztő">
    </select>
    <input type="submit" value="ok">
</form>
