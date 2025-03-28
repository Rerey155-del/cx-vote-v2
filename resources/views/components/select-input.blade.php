<select name="{{ $name }}" id="{{ $name }}"
    {{ $attributes->merge([
        'class' => 'block w-full border-dark rounded-md shadow-sm focus:ring focus:ring-orange-400 focus:border-transparent transition delay-75'
    ]) }}>

    <option value="" disabled selected hidden class="text-center">-- Pilih --</option>

    @foreach ($options as $key => $groupOrLabel)
        @if (is_array($groupOrLabel))
            <optgroup label="{{ $key }}" class="font-semibold bg-orange-300">
                @foreach ($groupOrLabel as $value => $label)
                    <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} class="bg-white absolute">
                        {{ $label }}
                    </option>
                @endforeach
            </optgroup>
        @else
            <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>
                {{ $groupOrLabel }}
            </option>
        @endif
    @endforeach
</select>
