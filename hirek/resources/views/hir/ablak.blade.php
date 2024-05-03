<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Új hír felvétele</h4>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" class="form-container" action="{{route('mentes')}}" method="Post">
                                @foreach ($korlat as $korlat)
                                @csrf
                                @method('Post')
                                <label>Cím:</label><br>
                                <p>Maximalis character száma a címhez: {{$korlat->cim_hossza}}</p>
                                <input type="text" onkeyup="szamlaloCim()" id="cim" name="cim" value="" maxlength="{{$korlat->cim_hossza}}">
                                <div id="character-counter">
                                    <span id="typed-charactersCim">0</span>
                                    <span>/</span>
                                    <span id="maximum-characters">{{$korlat->cim_hossza}}</span>
                                </div><br><br>
                                <label>Szöveg:</label><br>
                                <p>Maximalis character száma a szöveghez: {{$korlat->tartalom_hossza}}</p>
                                <textarea rows="10" onkeyup="szamlaloTartalom()" id="tartalom" name="tartalom" value="" maxlength="{{$korlat->tartalom_hossza}}"></textarea>
                                <div id="character-counter">
                                    <span id="typed-characters">0</span>
                                    <span>/</span>
                                    <span id="maximum-characters">{{$korlat->tartalom_hossza}}</span>
                                </div>
                                <br><br>
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Bezárás</button>
                                <button type="submit" value="Submit" action="{{redirect(Request::url())}}">Változtatások mentése</button>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" a href="#myModal" data-bs-toggle="modal">Új hír felvétele</button>
                <form class="float-right" action="{{'/kereses'}}" method="GET">
                    <input type="text" name="kereses" placeholder="Kereses">
                    <button type="submit">Keresés</button>
                </form>
                <div class="p-6 text-gray-900">
                <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Cím</th>
                                <th class="text-center">Szöveg</th>
                                <th class="text-center">Szerkesztő</th>
                                <th class="text-center">Létrehozás dátuma</th>
                                <th class="text-center">Utolsó szerkesztés dátuma</th>
                                <th class="text-center">felolvasások_száma</th>
                                <th class="text-center">Érvényesség</th>
                                <th class="text-center">Törlés</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Hir as $hir)
                            <tr>
                                <td>
                                    <p>{{$hir->cim}}</p>
                                </td>
                                <td>
                                    <p>{{$hir->tartalom}}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{$hir->szerkeszto}}</p>
                                </td>
                                <td>
                                    <p>{{$hir->letrehozas}}</p>
                                </td>
                                <td>
                                    <p>{{$hir->utolso_szerkesztes}}</p>
                                </td>
                                <td>
                                    <p>{{$hir->felolvasasok_szama}}</p>
                                </td>
                                <td>
                                    <p>{{$hir->ervenyesseg}}</p>
                                </td>
                                <td class="text-center">
                                <form action="{{ route('hir.destroy', $hir->hir_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Törlés</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function szamlaloTartalom() {
        var length = document.getElementById('tartalom').value.length;
        document.getElementById('typed-characters').innerHTML = length;
    }

    function szamlaloCim() {
        var length = document.getElementById('cim').value.length;
        document.getElementById('typed-charactersCim').innerHTML = length;
    }
</script>