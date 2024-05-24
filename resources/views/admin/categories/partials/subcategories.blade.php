



@foreach ($categories as $category)
<option value="{{ $category->id }}" {{ $category->id == old('category') ? 'selected' : '' }}>
@php
$position = str_repeat('¦--', $category->position);
@endphp
{{ $position . ' ' . $category->name }}
</option>
@if ($category->children->isNotEmpty())
@include('admin.categories.partials.subcategories', ['categories' => $category->children])
@endif
@endforeach
