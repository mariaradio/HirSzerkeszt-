<form action="/api/users/{{$user->id}}" method=post>
    {{ csrf_field() }}
    {{method_field('Put')}}
    <input type="text" name="felhasznalonév" placeholder="felhasznalonév">
    <input type="text" name="password" placeholder="jelszo">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="felhasznalo_nev" placeholder="felhasznalo_nev">

    <select name="admin" placeholder="Admin">
        <option value=1
        <?php echo $user->admin == 1 ? 'selected' : '' ?>
        >Open</option>
        <option value=0
        <?php echo $user->admin == 0 ? 'selected' : '' ?>
        >Closed</option>
    </select>
    <select name="hirolvasó" placeholder="Hirolvasó">
        <option value=1
        <?php echo $user->hirolvasó ==1 ? 'selected' : '' ?>
        >Open</option>
        <option value=0
        <?php echo $user->hirolvasó ==  0 ?'selected' : '' ?>
        >Closed</option>
    </select>
    <select name="hirszerkesztő" placeholder="Hirszerkesztő">
        <option value=1
        <?php echo $user->hirszerkesztő==1 ? 'selected' : '' ?>
        >Open</option>
        <option value=0
        <?php echo $user->hirszerkesztő == 0 ?'selected' : '' ?>
        >Closed</option>
    </select>
</select>
<input type="submit" value="ok">
</form>
