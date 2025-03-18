<x-mail::message>
{{-- Custom Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello from Kenswed TVTC!')
@endif
@endif

{{-- Logo --}}
<div style="text-align: center; margin-bottom: 20px;">
    <img src="{{ asset('imgs/logo.jpg') }}" alt="Kenswed TVTC Logo" style="max-width: 200px;">
</div>

{{-- Intro Lines --}}
@foreach ($introLines as $line)
<p style="font-size: 16px; color: #333;">
    {{ $line }}
</p>
@endforeach

{{-- Main Call to Action --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
    {{ $actionText }}
</x-mail::button>
@endisset

{{-- Login Redirect --}}
<p style="font-size: 16px; margin-top: 20px;">
    Need to log in? Click the button below to access your account.
</p>
<x-mail::button :url="url('/login')" color="primary">
    Log in to Kenswed TVTC
</x-mail::button>

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
<p style="font-size: 16px; color: #333;">
    {{ $line }}
</p>
@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Best Regards,')<br>
<strong>Kenswed TVTC Team</strong>
@endif

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
    @lang(
        "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
        'into your web browser:',
        [
            'actionText' => $actionText,
        ]
    ) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
