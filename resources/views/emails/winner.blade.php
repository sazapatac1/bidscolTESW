<h1>Hello {{$name}},</h1>
<br>
<h2>@lang('mail.congrats')<h2>
<br>
<p> @lang('mail.message') </p>
<br>
<p>
    <b>Product:</b> <a href="{{ route('item.show', ['id' => $item->getId()]) }}">{{ $item->getName() }}</a>
</p>
Thanks,<br>
{{ config('app.name') }}
