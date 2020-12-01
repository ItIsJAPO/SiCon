@if($errors->any())
    <div class="-m-2 text-center pb-5">
        @foreach($errors->all() as $error)
        <div class="p-1">
            <div class="inline-flex items-center bg-white leading-none text-pink-600 rounded-full p-2 shadow text-teal text-sm">
                <span class="inline-flex px-2">{{ $error }}</span>
            </div>
        </div>
        @endforeach
    </div>
@endif
