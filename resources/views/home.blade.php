<html lang="en">
@include('include.head')

<body class="flex justify-center items-center min-h-screen">
    <div class="grid place-items-center grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 px-4 py-3  ">
        @foreach ($listOfPromotion as $item)
            <div class="flex flex-col rounded-2xl md:w-90 w-full h-[400] bg-[#ffffff] shadow-xl">
                <figure class="flex justify-center items-center rounded-2xl">
                    {{-- <img src="{{ $item->image }}" alt="Card Preview" class="rounded-t-2xl w-full h-auto min-h-[150px] max-h-[300px] object-cover"> --}}
                    <img src="{{ asset('images/' . $item->image) }}" alt="Card Preview" class="rounded-t-2xl w-full h-[150px] object-cover">
                </figure>
                <!---->
                <div class="flex flex-col p-8">
                    <div class="text-2xl font-bold  text-center text-[#374151] pb-6">{{$item->title}}</div>
                    <div class=" text-sm w-full h-auto min-h-[75px] max-h-[200px] text-center text-[#374151] break-words">{{$item->description}}</div>
                    <div class="flex justify-end pt-6 space-x-2">
                        <a class="w-full" href="{{ route('promotion', ['action' => 'edit', 'id' => $item->id]) }}">
                            <button class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform">edit</button>
                        </a>
                        <a class="w-full" href="{{ route('promotion', ['action' => 'detail', 'id' => $item->id]) }}">
                            <button class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform">detail</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach


    
</div>

<!-- Bottom-Right Corner -->
<div class="fixed bottom-4 right-4">
    <a href="{{ route('promotion', ['action' => 'add']) }}">
        <button class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform">ADD PROMOTION</button>

    </a>
</div>

</body>
</html>