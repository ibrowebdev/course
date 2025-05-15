@php
    $created_at = $courseId?->pivot?->created_at;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course Enrolled</title>
</head>

<body>
    <h1>
        You just enrolled in a {{ $courseId->title }} course on CourseLite
    </h1>
    <p>
        Title: {{ $courseId->title }}
        <br>
        Duration: {{ $courseId->duration }}
        <br>
        Date enrolled: {{ $courseId->users[0]->pivot->created_at }}
    </p>
    <a href={{ url('/course' . '/' . $courseId->id) }}>View Course</a>
</body>

</html>
