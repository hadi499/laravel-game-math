@extends('admin-layouts')



@section('content')
<div class="flex flex-col mt-10 justify-center items-center p-2">



  @if (session()->has('success'))
  <div class="w-[400px] p-4 bg-green-300 mb-7">
    {{ session('success') }}

  </div>

  @endif

  <div class="flex flex-col sm:flex-col md:flex-row items-start gap-8">
    <div class="border shadow-lg p-2 bg-gray-100 w-full md:w-[500px]   min-h-[500px]">
      <form method="POST" action="{{ route('admin.question.store',  $quiz) }}" class="">
        @csrf
        <div class="flex flex-col p-2  gap-3">
          <div>
            <p class="text-center text-2xl font-semibold mb-0">Form Question</p>
            <p class="text-center text-sm text-slate-500 font-semibold">{{$quiz->title}}</p>

          </div>
          <div class="flex flex-col gap-2 text-lg">
            <label for=question_text" class="">Question</label>
            <input type="text" name="question_text"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
              id=question_text>
          </div>
          <div class="flex flex-col gap-2 text-lg ">
            <p class="">Pick Answers</p>
            <div class="flex flex-col gap-3">
              <input type="text" autocomplete="off" name="option_a"
                class="px-4 py-2 w-20 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
              <input type="text" autocomplete="off" name="option_b"
                class="px-4 w-20 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
              <input type="text" autocomplete="off" name="option_c"
                class="px-4 w-20 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>

            </div>
          </div>
          <div class="flex flex-col gap-2 text-lg ">
            <label for="correct_answer">Correct Answer</label>
            <input type="text" name="correct_answer"
              class="w-24 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="
              correct_answer" required>
          </div>
        </div>
        <div class="flex justify-end mb-3">
          <button type="submit"
            class="mr-3  font-semibold px-5 py-2 border border-slate-600 hover:bg-blue-50 text-slate-700  rounded-sm mt-8">Save</button>

        </div>
      </form>

    </div>
    <div class="w-full md:w-[150px]  min-h-[500px]">
      @foreach ($questions as $q)
      <div class="mb-3">
        <a href="{{ route('admin.question.edit', $q->id) }}" class="">
          <div class="text-lg text-center font-semibold px-5 py-2 border rounded bg-gray-100 hover:bg-blue-50">
            {{$q->question_text}}
            = {{$q->correct_answer}}
          </div>
        </a>



      </div>
      @endforeach

    </div>

  </div>




</div>
</div>

@endsection