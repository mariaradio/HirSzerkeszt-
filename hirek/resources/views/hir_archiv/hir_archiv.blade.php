<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <form class="float-right" action="{{'/keresesAh'}}" method="GET" >
                    <input  type="text" name="kereses" placeholder="Kereses">
                    <button   type="submit">Keresés</button>
                </form>
                <div class="p-6 text-gray-900">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center"> Hir </th>
                                <th class="text-center"> Csere </th>
                                <th class="text-center"> Érvényesség </th>
                                <th class="text-center"> Cím </th>
                                <th class="text-center"> Tartalom </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hir_arhiv as $row)
                            <tr>
                                <td class="text-center"> {{$row->hir}} </td>
                                <td> {{$row->csere}} </td>
                                <td> {{$row->ervenyesseg}} </td>
                                <td> {{$row->cim}} </td>
                                <td> {{$row->tartalom}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>