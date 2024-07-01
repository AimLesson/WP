<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <table border="1">
            <tr>
                <td>Nama</td>
                <td>Username</td>
                <td>Email</td>
                <td>Unit</td>
                <td>Role</td>                
            </tr>

            @foreach ($user as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->username }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->unit }}</td>
                    <td>{{ $u->role }}</td>
                </tr>
            @endforeach
        </table>
</body>

</html>
