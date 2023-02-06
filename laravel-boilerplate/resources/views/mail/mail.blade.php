@component('mail::layout')

    @slot('header')
        @component('mail::footer')
        <div style="top:10px"></div>
        @endcomponent
    @endslot
    @slot('subcopy')
        <br>
        <p>{!! $data['description'] !!}</p>

        Thanks!<br>
    @endslot

    @slot('footer')
        @component('mail::footer')
            ©{{ date('Y') }}. All rights reserved!!
        @endcomponent
    @endslot
@endcomponent