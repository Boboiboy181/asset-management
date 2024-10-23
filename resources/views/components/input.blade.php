@props(['label', 'name', 'type', 'placeholder' => '{$text}'])

<div class="input-container">
  <label for="{{ $name }}">{{ $label }}</label>
  <label>
    <input name="{{ $name }}" type="{{ $type }} " placeholder="{{ $placeholder }}" />
  </label>
</div>