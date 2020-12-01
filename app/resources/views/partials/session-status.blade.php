@if(session('status'))
       <div class="-m-2 text-center pb-5">
        <div class="p-1">
                <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                    <span class="inline-flex px-2"> {{ session('status') }}</span>
                </div>
        </div>
    </div>
@endif
