@include('includes.elfinder-standalonepopup')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.galleries.store'] : ['admin.galleries.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup("slug", _i('Slug')) !!}
{!! Form::text("slug") !!}
{!! Form::closeGroup() !!}

@include('includes.form-locales-tabs')
<div class="tab-content">
    @foreach(Config::get('app.locales') as $lang => $locale)
        <div role="tabpanel" class="tab-pane{{ $lang == \LaravelLocalization::getCurrentLocale() ? ' active' : '' }}" id="lang-{{ $lang }}">
            {!! Form::openGroup("title_$lang", _i('Title (%s)', $lang)) !!}
            {!! Form::text("title_$lang") !!}
            {!! Form::closeGroup() !!}
        </div>
    @endforeach
</div>

<div class="form-group">
    <a href="#" class="popup_selector btn btn-primary" data-inputid="photos" data-options-callback="elFinderOptionsCallback">{{ _i("Select photos") }}</a>
</div>

<?php
$captionOptions = ['style' => 'width: 210px; height: 75px;', 'placeholder' => _i("Caption")];
?>

<div id="photos" class="d-flex flex-wrap">
    @foreach(request()->old('photos', $object->photos->toArray()) as $k => $photo)
        <div class="photo draggable p-2 text-center position-relative" style="cursor: move;">
            <img src="{{ asset($photo['tmb']) }}" alt="" class="img-thumbnail">
            <button type="button" class="btn btn-danger btn-sm delete position-absolute" style="top: 15px; right: 15px;"><i class="fa fa-trash"></i></button>
            {!! Form::textarea("photos[$k][caption]", $photo['caption'], $captionOptions) !!}
            {!! Form::hidden("photos[$k][path]", $photo['path']) !!}
            {!! Form::hidden("photos[$k][tmb]", $photo['tmb']) !!}
            {!! Form::hidden("photos[$k][sort]", $photo['sort'], ['class' => 'sort']) !!}
        </div>
    @endforeach
</div>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@push('scripts')
    <script>
        var photosIndex = 0;

        $(function () {
            var $photos = $('#photos');
            photosIndex = $photos.find('.photo').length;

            Sortable.create($photos.get(0), {
                draggable: '.draggable',
                animation: 150,
                onEnd: function () {
                    $photos.find('input.sort').each(function (index) {
                        $(this).val(index);
                    });
                }
            });

            $(document).on('click', '#photos .delete', function () {
                $(this).closest('.photo').remove();
            });
        });

        function elFinderOptionsCallback() {
            return {
                commandsOptions: {
                    getfile: {
                        folders: false,
                        multiple: true
                    }
                },
                getFileCallback: function (files) {
                    var photos = '';
                    for (var i = 0, length = files.length; i < length; i++) {
                        var file = files[i];

                        photos += '<div class="photo draggable p-2 text-center position-relative" style="cursor: move;">';
                        photos += '<img src="' + file.tmb + '" alt="" class="img-thumbnail">';
                        photos += '<button type="button" class="btn btn-danger btn-sm delete position-absolute" style="top: 15px; right: 15px;"><i class="fa fa-trash"></i></button>';
                        photos += '<textarea name="photos[' + photosIndex + '][caption]" class="form-control" {!! Html::attributes($captionOptions) !!}></textarea>';
                        photos += '<input type="hidden" name="photos[' + photosIndex + '][path]" value="' + file.path + '">';
                        photos += '<input type="hidden" name="photos[' + photosIndex + '][tmb]" value="' + file.tmb + '">';
                        photos += '<input type="hidden" name="photos[' + photosIndex + '][sort]" value="' + photosIndex + '" class="sort">';
                        photos += '</div>';

                        photosIndex++;
                    }

                    $('#photos').append(photos);

                    parent.jQuery.colorbox.close();
                }
            }
        }
    </script>
@endpush