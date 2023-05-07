<footer class="text-gray-300">
    <div class="form__container">
        <div class="container">
            <h4 class="header__title text-center">
                Bestill nå
            </h4>
            <p class="text-center mt-4">
                Vi elsker å rydde og det vises. Vennligst informer oss om dine rengjøringsbehov, så sender vi deg et tilbud.
            </p>
            <div class="flex items-center flex-col">
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4 w-full md:w-2/3">
                    <div>
                        <label class="text-xs">Name</label>
                        <input class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                    </div>
                    <div>
                        <label class="text-xs">E-mail</label>
                        <input class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                    </div>
                    <div>
                        <label class="text-xs">Telefon</label>
                        <input class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-1 w-full md:w-2/3">
                    <div>
                        <label class="text-xs">Message</label>
                        <textarea rows="5" class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"></textarea>
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-1 w-full md:w-2/3">
                    <div class="text-center">
                        <button type="submit" class="header__button">Wyślij</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer__container">
        <div class="container">
            <div class="row my-16 gap-2 md:gap-12 flex-col md:flex-row">
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