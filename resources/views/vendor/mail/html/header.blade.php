@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('logo.png')}}" class="logo" alt="Logo SEEC">
@else
<img src="{{asset('logo-dark.png')}}" width="150px"  alt="Logo SEEC">
{{-- {{ $slot }} --}}
@endif
</a>
</td>
</tr>
