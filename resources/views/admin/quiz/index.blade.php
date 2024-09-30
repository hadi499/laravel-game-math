@extends('admin-layouts')


@section('content')

<div class="flex justify-center">
  <div class="mt-8 w-full md:w-[900px] p-2">

    <div>
      <a class="bg-blue-700 px-2 py-2 shadow-lg rounded-lg text-white text-sm font-semibold hover:bg-blue-600"
        href="{{route('admin.quiz.create')}}">Create
        Quiz</a>

    </div>


    @if($quizzes && $quizzes->count() > 0)
    <div class="flex justify-evenly flex-wrap">
      @foreach ($quizzes as $quiz)
      <div class="mt-6 border p-4 shadow-lg bg-white w-[280px]">
        <p class="text-left font-semibold text-2xl">{{$quiz->title}}</p>
        <p class="text-left text-lg">Level: {{$quiz->level}}</p>
        <p class="text-left text-lg">Time: {{$quiz->time}}</p>
        <p class="text-left text-lg">Number of Questions: {{$quiz->number_of_questions}}</p>

        <a href="{{ route('admin.question.create', $quiz) }}">
          <div
            class="mt-3 text-center text-blue-700 py-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700">
            Add Question
          </div>

        </a>
        <!-- Button Edit -->
        <a href="{{ route('admin.quiz.edit', $quiz->id) }}">
          <div
            class="mt-3 text-center text-green-700 py-2 border border-green-500 rounded hover:text-white hover:bg-green-700">
            Edit Quiz
          </div>
        </a>

        <!-- Button Delete -->
        <form action="{{ route('admin.quiz.destroy', $quiz->id) }}" method="POST"
          onsubmit="return confirm('Are you sure you want to delete this quiz?');">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="mt-3 w-full text-center text-red-700 py-2 border border-red-500 rounded hover:text-white hover:bg-red-700">
            Delete Quiz
          </button>


      </div>
      @endforeach
    </div>

    @else
    <p class="text-secondary mt-5">Tidak ada kuis yang tersedia.</p>
    @endif



  </div>
</div>

@endsection