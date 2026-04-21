<!DOCTYPE html>

<html>
<head>
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Edit Event</h2>

@if ($errors->any()) <div class="alert alert-danger"> <ul>
@foreach ($errors->all() as $error) <li>{{ $error }}</li>
@endforeach </ul> </div>
@endif

<form method="POST" action="{{ route('events.update', $event->id) }}">
    @csrf
    @method('PUT')

```
<input type="text" name="title" class="form-control mb-2" value="{{ $event->title }}" required>

<textarea name="description" class="form-control mb-2" required>{{ $event->description }}</textarea>

<input type="date" name="date" class="form-control mb-2" value="{{ $event->date }}" required>

<input type="text" name="location" class="form-control mb-2" value="{{ $event->location }}" required>

<input type="number" name="max_attendees" class="form-control mb-2" value="{{ $event->max_attendees }}" required>

<button class="btn btn-primary">Update Event</button>
```

</form>

<a href="{{ route('events.index') }}" class="btn btn-secondary mt-2">Back</a>

</body>
</html>
