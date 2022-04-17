<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ $message->embed(asset('images/logo-colori-alterati.png')) }}" class="logo" alt="Apollo11 Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
