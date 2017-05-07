@if (count($errors) > 0)
    <div class="alert alert-danger alert-important">
        <p>{{ _i("Please correct the errors below:") }}</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif