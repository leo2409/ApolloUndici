@component('mail::message')
# Introduction

weeeee ciaooo. strunz!!!!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
