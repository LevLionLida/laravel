@if ($category)
{{--    <a href="#"--}}

{{--       class="p-2 link-secondary">--}}
{{--        {{ __($category?->name ?? '') }}--}}
{{--    </a>--}}

    <a href="{{ route('categories.show', $category->id) }}" class="p-2 link-secondary"> {{ __($category?->name ?? '') }}</a>
@endif
