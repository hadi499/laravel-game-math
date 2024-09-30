@extends('layouts')



@section('content')

<div class="p-2 w-full  flex justify-center">
  <div class="sm:w-[300px] md:w-[600px]">
    <h3 class="text-center text-xl font-semibold mb-4">Quiz Level Easy</h3>
    <div class="flex justify-evenly flex-wrap gap-2 ">



      @if($quizzes && $quizzes->count() > 0)

      @foreach ($quizzes as $quiz)
      <div class="mt-6 border p-2 shadow-lg w-full sm:w-[250px]">
        <p class="text-center font-semibold text-xl">{{$quiz->title}}</p>
        <p class="text-center text-lg">Level: {{$quiz->level}}</p>
        <p class="text-center text-lg">Time: {{$quiz->time}}</p>


        <a href="{{ route('quiz.easyStart', $quiz->id) }}">
          <div
            class="my-2 text-center text-blue-700 py-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700">
            Start Quiz
          </div>

        </a>





      </div>
      @endforeach
      @else
      <p class="text-secondary mt-5">Tidak ada kuis yang tersedia.</p>
      @endif



    </div>
  </div>

  @endsection