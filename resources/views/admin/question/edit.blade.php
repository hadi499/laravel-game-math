@extends('admin-layouts')

@section('content')
<div class="flex flex-col mt-10 justify-center items-center">

  <div>
    <form method="POST" action="{{ route('admin.question.update', $question->id) }}" class="w-[500px]">
      @csrf
      @method('PUT')
      <!-- Method untuk update -->

      <div class="border border-slate-500 rounded shadow-sm flex flex-col p-6 gap-3">
        <p class="text-center text-2xl font-semibold mb-3">Edit Question</p>

        <!-- Field Question Text -->
        <div class="flex flex-col gap-2">
          <label for="question_text" class="font-semibold">Question Text</label>
          <input type="text" name="question_text" value="{{ old('question_text', $question->question_text) }}"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="question_text">
        </div>

        <!-- Field Option A -->
        <div class="flex flex-col gap-2">
          <label for="option_a" class="font-semibold">Option A</label>
          <input type="text" name="option_a" value="{{ old('option_a', $question->option_a) }}"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="option_a">
        </div>

        <!-- Field Option B -->
        <div class="flex flex-col gap-2">
          <label for="option_b" class="font-semibold">Option B</label>
          <input type="text" name="option_b" value="{{ old('option_b', $question->option_b) }}"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="option_b">
        </div>

        <!-- Field Option C -->
        <div class="flex flex-col gap-2">
          <label for="option_c" class="font-semibold">Option C</label>
          <input type="text" name="option_c" value="{{ old('option_c', $question->option_c) }}"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="option_c">
        </div>

        <!-- Field Correct Answer -->
        <div class="flex flex-col gap-2">
          <label for="correct_answer" class="font-semibold">Correct Answer</label>
          <input type="text" name="correct_answer" value="{{ old('correct_answer', $question->correct_answer) }}"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="correct_answer">
        </div>
      </div>

      <div class="flex justify-end">
        <a href="{{route('admin.question.create',  $quiz)}}"
          class="mr-3 text-sm font-semibold px-3 py-1 border border-slate-600 hover:bg-blue-100 text-slate-700 hover:border-blue-600 rounded-sm mt-8">
          Cancel
        </a>
        <button type="submit"
          class="mr-3 text-sm font-semibold px-3 py-1 border border-slate-600 hover:bg-blue-100 text-slate-700 hover:border-blue-600 rounded-sm mt-8">
          Update
        </button>
      </div>
    </form>
  </div>

</div>
@endsection