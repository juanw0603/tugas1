@extends('layout')

 
@section('content')

<div class="flex flex-col rounded-2xl w-full md:w-[900px] lg:w-[1000px] min-h-[300px] bg-[#ffffff] shadow-xl mx-auto animate-move-up">
    <figure class="flex justify-center items-center rounded-2xl overflow-hidden">
        <img src="{{ asset('images/' . $promotion->image) }}" 
             alt="Card Preview" 
             class="rounded-t-2xl w-full max-h-[450px] object-cover">
    </figure>

    <div class="flex flex-col p-6 sm:p-8">
        <div class="text-xl sm:text-2xl font-bold text-center text-[#374151] pb-4 sm:pb-6">
            {{ $promotion->title }}
        </div>
        
        <div class="text-sm sm:text-base w-full min-h-[75px] max-h-[200px] text-center text-[#374151] break-words overflow-hidden">
            {{ $promotion->description }}
        </div>

        <div class="flex justify-center sm:justify-start pt-4 sm:pt-6 space-x-2 w-full">
            <a class="w-full sm:w-auto" href="{{ route('home') }}">
                <button class="bg-[#000000] text-[#ffffff] w-full sm:w-auto font-bold text-sm uppercase p-3 rounded-lg hover:bg-[#545454] active:scale-95 transition-transform transform animate-move-up">
                    Back to Home
                </button>
            </a>
        </div>
    </div>
</div>


<style>
    @keyframes move-up {
        0% {
            transform: translateY(25px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-move-up {
        animation: move-up 0.8s ease-out;
    }
</style>
@endsection
