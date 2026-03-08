@foreach($services as $service)
    <h1>{{ $service->title }}</h1>
    <p>بنوانے والا: {{ $service->user->name }}</p>
@endforeach