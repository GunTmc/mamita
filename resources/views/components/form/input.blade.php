@props([
    'label' => null,
    'type' => 'text',
    'name',
    'value' => null,
    'placeholder' => '',
    'disabled' => false,
])

<div class="w-full flex flex-col gap-1">
    @if (isset($label) || $errors->has($name))
        <legend class="flex gap-1 items-center text-sm ">{{ $label }}
            @error($name)
                <p class="text-red-500 text-xs"> *({{ $message }})</p>
            @enderror
        </legend>
    @endif
    @if ($type == 'textarea')
        <textarea class="textarea w-full border-2 border-black h-40" placeholder="{{ $placeholder }}" name={{ $name }}
            @if ($disabled) disabled @endif>{{ old($name, $value) }}</textarea>
    @elseif ($type == 'file')
        <div class="flex items-start gap-10">
            <input name="{{ $name }}" type="file" class="file-input w-full border-2 border-black"
                placeholder="{{ $placeholder }}" @if ($disabled) disabled @endif
                onchange="previewImage(this, '{{ $name }}')">

            <div class="w-20 h-20 overflow-hidden rounded-lg bg-gray-200 flex items-center justify-center">
                @if ($value != null && $value != '')
                    <img id="preview-{{ $name }}" src="{{ asset('storage/' . $value) }}"
                        class="w-20 h-20 object-cover">
                @else
                    <img id="preview-{{ $name }}" src="" class="w-20 h-20 object-cover hidden">
                    <span id="no-image-{{ $name }}" class="text-center text-black">No Image</span>
                @endif
            </div>
        </div>

        <script>
            function previewImage(input, name) {
                const file = input.files[0];
                const preview = document.getElementById('preview-' + name);
                const noImage = document.getElementById('no-image-' + name);

                if (file) {
                    preview.src = URL.createObjectURL(file);
                    preview.classList.remove('hidden');
                    if (noImage) noImage.classList.add('hidden');
                }
            }
        </script>
    @else
        <input name={{ $name }} type={{ $type }} class="input w-full border-2 border-black "
            placeholder="{{ $placeholder }}" readonly onfocus="this.removeAttribute('readonly')"
            value="{{ old($name, $value) }}" @if ($disabled) disabled @endif>
    @endif
</div>
