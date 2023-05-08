@if(Session::has('info'))
    <div class="alert active">
        <div class="bg-green-100 shadow-md border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Informasjon!</p>
            <p>
                {!! Session::get('info') !!}
            </p>
        </div>
    </div>
@endif

@if(Session::has('warning'))
    <div class="alert--warning active">
        <div class="bg-orange-100 shadow-md border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
            <p class="font-bold">Informasjon!</p>
            <p>
                {!! Session::get('warning') !!}
            </p>
        </div>
    </div>
@endif
