<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Button to trigger the modal -->
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">Új hír felvétele</button>
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
                                    <p><a href="#" data-bs-toggle="modal" data-bs-target="#editHir{{$hir->hir_id}}"> {{$hir->cim}} </a></p>
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

@foreach ($Hir as $hir)
<div class="modal fade" id="editHir{{$hir->hir_id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Hir</h4>
            </div>
            <div class="modal-body">
                <form id="editHirForm{{$hir->hir_id}}" class="form-container" action="{{ route('hir.update2', ['id' => $hir->hir_id]) }}" method="POST">
                    @foreach ($korlat as $kor)
                    @csrf
                    @method('PUT')
                    <label>Cím:</label><br>
                    <p>Maximalis character száma a címhez: {{$kor->cim_hossza}}</p>
                    <input type="text" id="cim{{$hir->hir_id}}" name="cim" value="{{$hir->cim}}" maxlength="{{$kor->cim_hossza}}"><br><br>
                    <label>Tartalom:</label><br>
                    <textarea rows="10" id="tartalom{{$hir->hir_id}}" name="tartalom" value="{{$hir->tartalom}}" maxlength="{{$kor->tartalom_hossza}}">{{$hir->tartalom}}</textarea><br><br>
                    <br><br>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Bezárás</button>
                    <button type="submit" value="Submit">Változtatások mentése</button>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


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
                    <input type="text" id="cim" name="cim" value="" maxlength="{{$korlat->cim_hossza}}"><br><br>
                    <label>Szöveg:</label><br>
                    <p>Maximalis character száma a szöveghez: {{$korlat->tartalom_hossza}}</p>
                    <textarea rows="10" id="tartalom" name="tartalom" value="" maxlength="{{$korlat->tartalom_hossza}}"></textarea>
                    <br><br>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Bezárás</button>
                    <button type="submit" value="Submit" action="{{redirect(Request::url())}}">Változtatások mentése</button>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
</script>