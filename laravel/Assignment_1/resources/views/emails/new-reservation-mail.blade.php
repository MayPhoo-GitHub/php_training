@component('mail::message')

<h3>{{ $data['title'] }}</h3>
<h3>{{ $data['body'] }}</h3>

@component('mail::button', ['url' => 'http://localhost:8000'])
View 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent