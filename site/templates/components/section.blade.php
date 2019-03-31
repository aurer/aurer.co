@php
		$element = isset($element) ? $element : 'div';
		$name = isset($name) ? ' Section--' . $name : '';
@endphp
<{{ $element }} class="Section{{ $name }}">
	<div class="Section-inner">
		{!! $slot !!}
	</div>
</{{ $element }}>