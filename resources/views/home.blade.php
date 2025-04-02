<html lang="en">
@include('include.head')

<body>
    <div class="grid sm:grid-cols-2 xl:grid-cols-2 gap-1 px-4 py-3  ">
        @foreach ($listOfPromotion as $item)
            <div class="flex flex-col rounded-2xl sm:w-56 bg-[#ffffff] shadow-xl">
                <figure class="flex justify-center items-center rounded-2xl">
                    <img src="{{ $item->image }}" alt="Card Preview" class="rounded-t-2xl">
                </figure>
                <!---->
                <div class="flex flex-col p-8">
                    <div class="text-2xl font-bold  text-center text-[#374151] pb-6">{{$item->title}}</div>
                    <div class=" text-sm  text-center text-[#374151]">{{$item->description}}</div>
                    <div class="flex justify-end pt-6 space-x-2">
                        <a class="w-full" href="{{ route('promotion', ['action' => 'edit']) }}">
                            <button class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform">edit</button>
                        </a>
                        <a class="w-full" href="{{ route('promotion', ['action' => 'edit']) }}">
                            <button class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform">detail</button>
                        </a>
                    </div>
                    <!---->
                </div>
            </div>
        @endforeach


    <div class="flex flex-col rounded-2xl sm:w-56 bg-[#ffffff] shadow-xl">
        <figure class="flex justify-center items-center rounded-2xl">
            <img src="https://tailwind-generator.b-cdn.net/images/card-generator/tailwind-card-generator-card-preview.png" alt="Card Preview" class="rounded-t-2xl">
        </figure>
        <!---->
        <div class="flex flex-col p-8">
            <div class="text-2xl font-bold  text-center text-[#374151] pb-6">Generator</div>
            <div class=" text-sm  text-center text-[#374151]">Leverage a graphical editor to create, design and customize beautiful web components.</div>
            <div class="flex justify-end pt-6 space-x-2">
                <a class="w-full" href="{{ route('promotion', ['action' => 'edit']) }}">
                    <button class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform">edit</button>
                </a>
                <a class="w-full" href="{{ route('promotion', ['action' => 'edit']) }}">
                    <button class="bg-[#000000] text-[#ffffff] w-full font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform">detail</button>
                </a>
            </div>
            <!---->
        </div>
    </div>
</div>

<!-- Bottom-Right Corner -->
<div class="fixed bottom-4 right-4">
    <a href="{{ route('promotion', ['action' => 'add']) }}">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full shadow-lg">
            ADD PROMOTION
        </button>
    </a>
</div>

</body>
</html>