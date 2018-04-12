@if (!empty($accordion) && $accordion->accordionItems->isNotEmpty())
    <div class="accordion" id="accordion-{{ $shortcode->id }}">
        @foreach($accordion->accordionItems as $accordionItem)
            <div class="card">
                <div class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse-{{ $accordionItem->id }}">
                        {{ $accordionItem->title }}
                    </a>
                </div>
                <div id="collapse-{{ $accordionItem->id }}" class="collapse" data-parent="#accordion-{{ $shortcode->id }}">
                    <div class="card-body">
                        {!! $accordionItem->content !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif