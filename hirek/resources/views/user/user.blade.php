

<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="py-12">
        <div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ujfelhasznalo" a href="#ujfelhasznalo" data-bs-toggle="modal">Új felhasznalo felvétele</button>
                <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ujkorlat" a href="#ujkorlat" data-bs-toggle="modal">Új korlát felvétele</button>
                <form class="float-right" action="{{'/KeresUs'}}" method="GET" >
                    <input  type="text" name="kereses" placeholder="Kereses">
                    <button   type="submit">Keresés</button>
                </form>
                <div class="p-6 text-gray">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center"> felhasználó id </th>
                                <th class="text-center"> felhasználó név </th>
                                <th class="text-center"> jelszó </th>
                                <th class="text-center"> email </th>
                                <th class="text-center"> admin </th>
                                <th class="text-center"> szerkeszto </th>
                                <th class="text-center"> olvaso </th>
                                <th class="text-center"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $row)
                            <tr>
                                <td class="text-center"> {{$row->felhasznalo_id}} </td>
                                <td><a href="#myModal{{$row->felhasznalo_id}}" data-bs-toggle="modal"> {{$row->felhasznalo_nev}} </a></td>
                                <td> {{$row->password}} </td>
                                <td> {{$row->email}} </td>
                                <td class="text-center"> <input name="admin" type="checkbox" disabled="disabled" value="{{$row->admin}}" {{$row->admin ? 'checked' : ''}}> </td>
                                <td class="text-center"> <input name="szerkeszto" type="checkbox" disabled="disabled" value="{{$row->szerkeszto}}" {{$row->szerkeszto ? 'checked' : ''}}> </td>
                                <td class="text-center"> <input name="olvaso" type="checkbox" disabled="disabled" value="{{$row->olvaso}}" {{$row->olvaso ? 'checked' : ''}}> </td>
                                <td class="text-center"> <input type="button" class="deleteBtn" data-toggle="modal" data-target="#myModal{{$row->felhasznalo_id}}" value="🗑"> </td>
                            </tr>

                            <div class="modal fade" id="myModal{{$row->felhasznalo_id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm{{$row->felhasznalo_id}}" class="form-container" action="{{ route('user.update2', ['id' => $row->felhasznalo_id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <label>Felhasználónév:</label><br>
                                                <input type="text" id="felhasznalonev{{$row->felhasznalo_id}}" name="felhasznalonev" value="{{$row->felhasznalo_nev}}"><br><br>
                                                <label>Jelszó:</label><br>
                                                <input type="text" id="jelszo{{$row->felhasznalo_id}}" name="jelszo" value="{{$row->password}}"><br><br>
                                                <label>Email:</label><br>
                                                <input type="text" id="email{{$row->felhasznalo_id}}" name="email" value="{{$row->email}}"><br><br>
                                                <div class="row">
                                                    <div class="col">
                                                        <p>admin</p> <input name="rows[admin]" type="checkbox" value="{{$row->admin}}" {{$row->admin ? 'checked' : ''}}>
                                                    </div>
                                                    <div class="col">
                                                        <p>szerkesztő</p> <input name="rows[szerkeszto]" type="checkbox" value="{{$row->szerkeszto}}" {{$row->szerkeszto ? 'checked' : ''}}>
                                                    </div>
                                                    <div class="col">
                                                        <p>olvasó</p> <input name="rows[olvaso]" type="checkbox" value="{{$row->olvaso}}" {{$row->olvaso ? 'checked' : ''}}>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Bezárás</button>
                                                <button type="submit" value="Submit">Változtatások mentése</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                            <div class="modal fade" id="ujfelhasznalo" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Új felhasználó felvétele</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm" class="form-container" action="{{route('felhasznaloMentes')}}"  method="Post">
                                                @csrf
                                                @method('Post')
                                                <label>Felhasználónév:</label><br>
                                                <input type="text" id="felhasznalo_nev" name="felhasznalo_nev" value=""><br><br>
                                                <label>Jelszó:</label><br>
                                                <input type="text" id="password" name="password" value=""><br><br>
                                                <label>Email:</label><br>
                                                <input type="text" id="email" name="email" value=""><br><br>
                                                <input type="checkbox" name="admin" value="admin"/>
                                                <label>Admin jogosultság beállitása:</label><br>
                                                <input type="checkbox" name="szerkeszto" value="szerkeszto"/>
                                                <label>Szerkesztő jogosultság beállitása:</label><br>
                                                <input type="checkbox" name="olvaso" value="olvaso" />
                                                <label>Olvaso jogosultság beállitása:</label><br>
                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Bezárás</button>
                                                <button type="submit" value="Submit" action="{{redirect(Request::url())}}" >Változtatások mentése</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="ujkorlat" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm{{$row->felhasznalo_id}}" class="form-container" action="{{ route('user.update3', ['id' => $row->felhasznalo_id]) }}" method="POST">
                                                @csrf
                                                @method('Post')
                                                <label>Cím hosszanak megadasa:</label><br>
                                                <input type="number" id="cim_hossza" name="cim_hossza" value=""><br><br>
                                                <label>Szöveg hosszanak megadása:</label><br>
                                                <input type="number" id="tartalom_hossza" name="tartalom_hossza" value=""><br><br>
                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Bezárás</button>
                                                <button type="submit" value="Submit">Változtatások mentése</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function updateUser(userId) {
                                    var felhasznalonev = document.getElementById('felhasznalonev' + userId).value;
                                    console.log(felhasznalonev)
                                    var jelszo = document.getElementById('jelszo' + userId).value;
                                    var email = document.getElementById('email' + userId).value;
                                    var admin = document.getElementById('admin' + userId).value;
                                    var szerkeszto = document.getElementById('szerkeszto' + userId).value;
                                    var olvaso = document.getElementById('olvaso' + userId).value;
                                }
                            </script>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




