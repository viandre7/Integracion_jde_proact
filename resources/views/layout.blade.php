<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'software')
    </title>
    <style>
                table {  font-family: "Lucida Sans Unicode", "Lucida Grande";  width: 90%; text-align: center;    border-collapse: collapse; }

                th {  font-size: 16px; font-weight: bold; padding: 3px; background: #b9c9fe; color: #039; text-align: center}

                td {  padding: 4px; background: #e8edff; border-bottom: 1px solid #fff;
                    color: #669; border-top: 1px solid transparent; }
                tr:hover td { background: #d0dafd; color: #339; }
                .table {margin: auto;}
        </style>
</head>
<body>
    

    @include('nav')
    @yield('content')   
</body>
</html>