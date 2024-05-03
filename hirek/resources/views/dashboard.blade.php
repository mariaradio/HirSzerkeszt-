<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: linear-gradient(#0266b2, #cce9f7);
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Középre igazítás */
            align-items: center; /* Középre igazítás */
            height: 100vh; /* Teljes viewport magasság beállítása */
        }

        .menu {
            width: 80%; /* Szélesség 80%-ra */
            max-width: 600px; /* Maximális szélesség 600px */
            margin: auto; /* Középre igazítás */
            font-size: larger; /* Kis méretváltozás */
            text-align: center;
        }

        .bubble {
            border: 2px black solid;
            border-radius: 15px;
            background-color: #cce9f7;
            margin: 10px;
            padding: 12px;
        }

        .menu a {
            color: black;
            text-decoration: none;
        }

        .menu a:hover {
            color: gray;
        }
    </style>
</head>
<body>

<div class="menu row">
    <div class="col-md-6">
        <div class="bubble">
            <a href="{{ url('/hir') }}">
                <h2>Hír</h2>
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bubble">
            <a href="{{ url('/hir_archiv') }}">
                <h2>Hír Archív</h2>
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bubble">
            <a href="{{ url('/felolvasas') }}">
                <h2>Felolvasás</h2>
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bubble">
            <a href="{{ url('/user') }}">
                <h2>Felhasználó</h2>
            </a>
        </div>
    </div>
</div>

</body>