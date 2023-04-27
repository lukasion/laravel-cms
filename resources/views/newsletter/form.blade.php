@extends ('index')

@section ('content')
    <div class="py-3 mt-0 pb-10">
        <div class="container">
            <form action="" method="POST">
                @csrf
                <div class="m-auto xl:w-9/12 lg:w-7/12 md:w-8/12 mb-12 md:mb-0 mt-8">
                    <div>
                        <label for="name">Nazwa kampanii:</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="name"
                            placeholder="Nazwa kampanii *"
                            required
                            value="@isset ($newsletter){{ $newsletter->name }}@endisset"
                        />
                    </div>
                    <div class="mt-4">
                        <label for="name">Data rozpoczęcia kampanii:</label>
                        <input
                            type="date"
                            name="date"
                            class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="date"
                            required
                            placeholder="Data rozpoczęcia kampanii *"
                            value="@isset ($newsletter){{ date("Y-m-d", strtotime($newsletter->start_datetime)) }}@endisset"
                        />
                    </div>
                    <div class="mt-4">
                        <label for="name">Godzina rozpoczęcia kampanii:</label>
                        <input
                            type="time"
                            name="time"
                            class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="time"
                            required
                            placeholder="Godzina rozpoczęcia kampanii *"
                            value="@isset ($newsletter){{ date("H:i", strtotime($newsletter->start_datetime)) }}@endisset"
                        />
                    </div>
                    <div class="mt-4">
                        <label for="name">Status kampanii:</label>
                        <select
                            name="status_id"
                            class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="status_id"
                            required
                            placeholder="Status kampanii *">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" @if (!empty($newsletter) && $status->id == $newsletter->status_id){{ 'selected' }}@endif>{{ $status->name }}</option>
                            @endforeach
                        </select>
                            {{-- value="@isset ($newsletter){{ date("H:i", strtotime($newsletter->start_datetime)) }}@endisset" --}}
                        
                    <div class="mt-4">
                        <label for="tiny">Treść newslettera:</label>
                        <textarea rows="25" name="content" id="tiny" style="width: 100%;">@isset ($newsletter){{ $newsletter->content }}@endisset</textarea>
                    </div>

                    <input type="submit" class="bg-blue-600 hover:bg-blue-500 cursor-pointer transition-all text-white font-semibold py-2 px-4 rounded" value="Zapisz kampanię" style="margin-top: 15px;" />

                    <a href="{{ route('newsletterList') }}" class="bg-gray-600 hover:bg-gray-500 cursor-pointer transition-all text-white font-semibold py-2 px-4 rounded" style="margin-top: 15px;">Powrót</a>
                </div>

            </form>
            <br />
        </div>
    </div>
@endsection