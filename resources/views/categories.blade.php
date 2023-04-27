<div class="bg-slate-100 pt-3 mt-0">
    <div class="container">
        <div class="flex justify-start items-start flex-col md:flex-row mt-2">
            <ul class="category__menu">
                <li>
                    <a href="{{ route('articles') }}"><span class="font-semibold">Wszystkie artykuły</span></a>
                </li>
                @foreach ($categories as $category)
                    <li @class(['category__link--more' => $loop->index > 10])>
                        <a href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach

                @if ($categories->count() > 10)
                    <li>
                        <a href="#" class="js-showAllCategories">
                            <span class="font-semibold">Pokaż więcej</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>