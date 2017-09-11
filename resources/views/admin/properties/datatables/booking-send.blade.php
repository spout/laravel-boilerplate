<div class="btn-group btn-group-xs">
    @foreach($emailTypes as $emailType)
        <a href="{{ route('admin.properties.send-email', ['id' => $booking->id, 'type' => $emailType->type]) }}" class="btn btn-primary">{{ $emailType->title }}</a>
    @endforeach
</div>