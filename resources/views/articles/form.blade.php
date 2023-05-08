@extends ('index')

@section ('content')
    <div class="py-3 mt-12 pb-10">
        <div class="container">
            <h1 class="text-center text-xl" style="margin: 65px 0 0;">
                @isset ($article)
                    <strong>Redigering av en artikkel:</strong> {{ $article->name }} (ID: {{ $article->id }})
                @else
                    <strong>Opprette en artikkel</strong>
                @endisset
            </h1>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="m-auto w-full mb-12 md:mb-0 mt-8">
                    <div>
                        <label for="name">Artikkelnavn*:</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="name"
                            placeholder="Artikkelnavn *"
                            required
                            value="@isset ($article){{ $article->name }}@endisset" />
                    </div>
                    {{-- <div class="mt-4">
                        <label for="name">Kategoria:</label>
                        <select
                            name="category_id"
                            class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="category_id"
                            placeholder="Kategoria *">
                            <option value="">-- Wybierz kategorię --</option>
                            @foreach ($categories as $category)
                                <option 
                                    value="{{ $category->id }}" 
                                    @if (!empty($article->category_id) && $article->category_id == $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    {{-- <div class="mt-4">
                        @if (!empty($article->photo))
                            <p><strong>Aktualne zdjęcie:</strong></p>
                            <img src="/images/articles/{{ $article->photo }}" style="max-width: 335px; max-height: 190px;" class="mb-4" />
                        @endif

                        <label
                            for="formFile"
                            class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                            >Zdjęcie artykułu:</label
                        ><br />
                        <input
                            class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:bg-transparent dark:text-neutral-200 dark:focus:bg-transparent"
                            type="file"
                            name="photo"
                            id="formFile" />
                    </div> --}}

                    <div class="mt-4 flex flex-col items-center">
                        @php
                            $width = !empty($article) && in_array($article->id, [11, 12, 13]) ? '435px' : '100%';
                        @endphp
                        <label for="tiny">Innholdet i artikkelen:</label>
                        <textarea rows="35" name="content" id="tiny" style="width: {{ $width }}">@isset ($article){{ $article->content }}@endisset</textarea>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="bg-blue-600 hover:bg-blue-500 cursor-pointer transition-all text-white font-semibold py-2 px-4 rounded" value="Lagre artikkelen" style="margin-top: 15px;" />
                        <a href="{{ route('index') }}" class="bg-gray-600 hover:bg-gray-500 cursor-pointer transition-all text-white font-semibold py-2 px-4 rounded" style="margin-top: 15px;">Komme tilbake</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- Background for specify articles -->
    @if (!empty($article))
        @php
            $bg = '';
            if (in_array($article->id, [104])) {
                $bg = '#fff';
            } elseif (in_array($article->id, [15])) {
                $bg = '#14374c';
            }
        @endphp

        @if (!empty($bg)) 
            <script defer>
                window.onload = function() {
                    document.getElementById('tiny_ifr').style.background = '{{ $bg }}';
                };
            </script>
        @endif
    @endif
@endsection