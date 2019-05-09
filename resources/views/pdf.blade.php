<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Export PDF</title>
    </head>
    <body>
        <table border=1 style='boder-collapse:collapse'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Birth Date</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contact as $cont)
                    <tr>
                        <td>{{$cont->id}}</td>
                        <td>{{$cont->nik}}</td>
                        <td>{{$cont->name}}</td>
                        <td>{{$cont->birthdate}}</td>
                        <td>{{$cont->age}}</td>
                        <td>{{$cont->gender}}</td>
                        <td>{{$cont->address}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>