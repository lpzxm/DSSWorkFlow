<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titulo')</title>
    <style>
        .tabla {
            border-collapse: collapse;
            border: 1px solid;
        }

        .tabla td {
            border-collapse: collapse;
            border: 1px solid;
        }

        .tabla th {
            border-collapse: collapse;
            border: 1px solid;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
            border-top: 3px solid #4CAF50;
        }

        footer p {
            margin: 5px 0;
        }

        .footer-name {
            font-weight: bold;
            font-size: 16px;
        }

        .footer-career {
            font-style: italic;
        }

        .footer-year {
            color: #aaa;
        }
    </style>
</head>

<body>
    @yield('contenido')
</body>

</html>