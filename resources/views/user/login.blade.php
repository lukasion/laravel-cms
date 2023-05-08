@extends ('index', ['withoutHeader' => true, 'withoutForm' => true])

@section ('content')
    <div class="py-3 mt-0 pb-10">
        <div class="container">
            <h2 class="title mt-10">
                <span>Logg inn på systemet</span>
            </h2>
            <div class="m-auto xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0 mt-8">
                <form action="" method="POST">
                    @csrf
            
                    <!-- Email input -->
                    <div class="mb-6">
                        <input
                            type="text"
                            name="login"
                            class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput2"
                            placeholder="Login *"
                            value="{{ $login }}"
                        />
                    </div>
            
                    <!-- Password input -->
                    <div class="mb-6">
                        <input
                            type="password"
                            name="password"
                            class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleFormControlInput2"
                            placeholder="Passord *"
                        />
                    </div>
            
                    <div class="text-center lg:text-left">
                        <button
                            type="submit"
                            class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                        >
                        Logg Inn
                        </button>

                        <a 
                            href="{{ route('index') }}"
                            class="inline-block px-7 py-3 bg-gray-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out"
                        >
                        Tilbake til hovedsiden
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection