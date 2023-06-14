<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>
{{--
             $table->string('code');
            $table->string('name');
            $table->integer('floor');
            $table->string('image');
            $table->integer('capacity');
  --}}

  <ul>
    <li>{{ $room->name }}</li>
    <li>{{ $room->code }}</li>
    <li>{{ $room->floor }}</li>
    <li>{{ $room->image }}</li>
    <li>{{ $room->capacity }}</li>
  </ul>
</body>
</html>
