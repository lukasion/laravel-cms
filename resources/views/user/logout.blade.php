@extends ('index', ['withoutHeader' => true])

@section ('content')
    <div class="py-3 mt-0 pb-10">
        <div class="container">
            <h2 class="title mt-10">
                <span>Wylogowanie z systemu</span>
            </h2>
            <div class="m-auto xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0 mt-8">
                <form action="{{ route('userLogout') }}" method="POST">
                    @csrf
            
                    <div class="mb-6">
                        <p><strong>Wylogowanie</strong></p>
                        <p>Czy potwierdzasz chęć wylogowania z systemu?</p>
                    </div>
            
                    <div class="text-center lg:text-left">
                        <button
                            type="submit"
                            class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                        >
                        Wyloguj się
                        </button>

                        <a
                            href="{{ route('index') }}"
                            class="inline-block px-7 py-3 bg-gray-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-3"
                        >
                        Powrót do strony głównej
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection