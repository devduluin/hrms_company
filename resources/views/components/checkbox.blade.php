@props([
    'id',
    'name',
    'label',
    'guidelines',
    
])
<div>
    <div class="flex items-center my-2">
        <input type="checkbox" id="{{ $id }}" name="{{ $name }}" class="form-checkbox rounded h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
        <label class="ml-2 block text-sm text-gray-900">
            {{ $label }}
        </label>
    </div>
    <div class="mt-1.5 mr-5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
        {{ $guidelines ?? '' }}
    </div>
</div>
