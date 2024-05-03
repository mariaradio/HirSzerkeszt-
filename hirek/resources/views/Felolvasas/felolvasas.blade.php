<x-app-layout>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <form class="float-right" action="{{'/Keresf'}}" method="GET" >
                    <input  type="text" name="kereses" placeholder="Kereses">
                    <button   type="submit">Keresés</button>
                </form>
                <div class="p-6 text-gray-900">
                
                <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>felolvasasra feladas</th>
                                <th> Címe </th>
                                <th> Szöveg </th>
                                <th> Felolvasások számát</th>
                                <th> Hírszerző </th>
                                <th> Lejárat ideje </th>
                            </tr>
                        </thead>
                        <form action="{{'felolvasas'}}" method="Post">
                        @csrf
                        @method('Post')
                        <tbody>
                        @foreach($fel as $row)
                            <tr>
                                <td class="text-align:center">
                                    <input type="checkbox" name="rows[felolvasas]" value={{$row->hir_id}} > </input>
                                </td>
                                <td> {{$row->cim}} </td>    
                                <td> {{$row->tartalom}}</td>
                                <td> {{$row->felolvasasok_szama}}</td>
                                <td> {{$row->szerkeszto}}</td>
                                <td> {{$row->ervenyesseg}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Felolvasas Mentese</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>