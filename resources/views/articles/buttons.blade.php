@if (Auth::user())
    <div class="mt-6 text-center">
        <a href="/article/edit/{{ $article->id }}" class="bg-slate-200 hover:bg-slate-300 border-zinc-400 border cursor-pointer transition-all w-full text-black font-semibold py-2 px-4 rounded">Edytuj artykuł</a>
        {{-- <a href="/article/delete/{{ $article->id }}" class="bg-zinc-600 hover:bg-zinc-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded">Usuń artykuł</a> --}}
    </div>
@endif