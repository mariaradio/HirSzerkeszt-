
<html>
    <head>

    </head>
    <body>
        <header>
            <table>
                <thead>

                </thead>
                <tbody>
                    <tr>
                        @foreach ($hirs['hir_id'] as $hir)
                        <td>
                            <p>{{$hir}}</p>
                        </td>
                        @endforeach
                        @foreach ($hirs['szerkeszto'] as $hir)
                        <td>
                            <p>{{$hir}}</p>
                        </td>
                        @endforeach
                        @foreach ($hirs['cim'] as $hir)
                        <td>
                            <p>{{$hir}}</p>
                        </td>
                        @endforeach
                        @foreach ($hirs['tartalom'] as $hir)
                        <td>
                            <p>{{$hir}}</p>
                        </td>
                        @endforeach
                        @foreach ($hirs['letrehozas'] as $hir)
                        <td>
                            <p>{{$hir}}</p>
                        </td>
                        @endforeach
                        @foreach ($hirs['utolso_szerkesztes'] as $hir)
                        <td>
                            <p>{{$hir}}</p>
                        </td>
                        @endforeach
                        @foreach ($hirs['felolvasasok_szama'] as $hir)
                        <td>
                            <p>{{$hir}}</p>
                        </td>
                        @endforeach
                        @foreach ($hirs['ervenyesseg'] as $hir)
                        <td>
                            <p>{{$hir}}</p>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </header>
    </body>
</html>