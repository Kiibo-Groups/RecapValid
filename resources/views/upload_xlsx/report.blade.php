<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<table>
  <thead>
    <tr>
      <td><b>ID</b></td>
      <td><b>Poliza</b></td>
      <td><b>Inivio Vigencia</b></td>
      <td><b>Termino Vigencia</b></td>
      <td><b>Marca</b></td>
      <td><b>Submarca</b></td>
      <td><b>Modelo</b></td>
      <td><b>Cancelable</b></td>
      <td><b>Status</b></td>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
    <tr>
      <td>#{{ $row['id'] }}</td>
      <td>{{ $row['poliza'] }}</td>
      <td>{{ $row['start_vig'] }}</td>
      <td>{{ $row['end_vig'] }}</td>
      <td>{{ $row['marca'] }}</td>
      <td>{{ $row['submarca'] }}</td>
      <td>{{ $row['modelo'] }}</td>
      <td>{{ $row['cancelable'] }}</td>
      <td>{{ $row['status'] }}</td>
    </tr>
    @endforeach   
  </tbody>
</table>
</body>
</html>