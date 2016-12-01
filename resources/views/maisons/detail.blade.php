@extends('layouts.app')

@section('content')
<script>
    $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Chargement de l\'image en cours...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            }
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Nom:</span> {!! $maison->name !!}
                    </li>
                    <li class="list-group-item">
                        <p style="font-weight: bold;">Image Principale:</p>
                        <img src="{!! asset($maison->main_picture) !!}" class="img-responsive" style="margin:auto;"/>
                    </li>
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Ville:</span> {!! $maison->ville->name !!}
                    </li>
                    @if($gallery_pictures != null)
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Gallery des images:</span>
                        <div class="popup-gallery">
                            @foreach($gallery_pictures as $pic)
                            <a href="{!! asset($pic->path) !!}">
                                <img src="{!! asset($pic->path) !!}" height="100">
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endif
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Présentation:</span>
                        <p>{!! $maison->presentation !!}</p>
                    </li>
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Services:</span>
                        <p>{!! $maison->services !!}</p>
                    </li>
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Position:</span> {!! $maison->longitude !!}{!! $maison->latitude !!}
                    </li>
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Contact:</span>
                        <p>{!! $maison->contact !!}</p>
                    </li>
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Date de création:</span> {!! $maison->created_at !!}
                    </li>
                    <li class="list-group-item">
                        <span style="font-weight: bold;">Date de dernière modification:</span> {!! $maison->updated_at !!}
                    </li>
                </ul>
        </div>
    </div>
</div>
@endsection