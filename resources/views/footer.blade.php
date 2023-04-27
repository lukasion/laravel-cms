<footer class="text-gray-300">
    <div class="footer__container">
        <div class="container">
            <div class="row my-16 gap-12 flex-col md:flex-row">
                <div class="col">
                    @include('articles.show', ['article' => $footerArticle])
                </div>
                <div class="col">
                    @include('articles.show', ['article' => $footerArticle2])
                </div>
                <div class="col">
                    @include('articles.show', ['article' => $footerArticle3])
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <p class="text-center text-white">Copyright &copy; {{ date("Y") }} - created by <a href="https://github.com/lukasion" target="_blank">ellukasion</a></p>

        @if (Auth::check())
            <p class="text-center mt-5">
                <a class="bg-gray-700 hover:bg-gray-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="{{ route('userLogin') }}">Wyloguj się</a>
                {{-- <a class="bg-gray-700 hover:bg-gray-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="{{ route('newsletterList') }}">Newsletter</a> --}}
            </p>
        @endif
    </div>
</footer>