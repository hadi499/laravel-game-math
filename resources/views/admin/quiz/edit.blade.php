@extends('admin-layouts')

@section('content')
<div class="flex flex-col mt-10 md:justify-center md:items-center ">

  <div>
    <!-- Form Edit Quiz -->
    <form method="POST" action="{{ route('admin.quiz.update', $quiz->id) }}" class="md:w-[500px] ">
      @csrf
      @method('PUT')
      <!-- Method untuk update -->

      <div class="border border-slate-500 rounded shadow-sm flex flex-col p-2 sm:p-6 gap-3">
        <p class="text-center text-2xl font-semibold mb-3">Edit Quiz</p>

        <!-- Field Title -->
        <div class="flex flex-col gap-2">
          <label for="title" class="font-semibold">Title</label>
          <input type="text" name="title" value="{{ old('title', $quiz->title) }}"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="title">
        </div>
        <div class="flex flex-col gap-2">
          <label for="topic" class="font-semibold">Topic</label>
          <input type="text" name="topic"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="topic" value="{{ old('topic', $quiz->topic) }}">
        </div>

        <!-- Field Level -->
        <div class="flex flex-col gap-2">
          <label for="level" class="font-semibold">Level</label>
          <input type="text" name="level" value="{{ old('level', $quiz->level) }}"
            class="w-1/2 md:w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required id="level">
        </div>

        <!-- Field Time -->
        <div class="flex flex-col gap-2">
          <label for="time" class="font-semibold">Time</label>
          <input type="number" name="time" value="{{ old('time', $quiz->time) }}"
            class="w-1/2 sm:w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required id="time">
        </div>
        <div class=" flex flex-col gap-2">
          <label for="number_of_questions" class="font-semibold">Number of questions</label>
          <input type="number" name="number_of_questions"
            class="w-1/2 md:w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required id="number_of_questions" value="{{ old('number_of_question', $quiz->number_of_questions) }}">
        </div>
      </div>

      <!-- Button Save -->
      <div class="flex justify-end">
        <a href="{{route('admin.quiz.index')}}"
          class="text-sm font-semibold px-3 py-1 border border-slate-600 hover:bg-blue-100 text-slate-700 hover:border-blue-600 rounded-sm mt-8">
          Cancel
        </a>
        <button type="submit"
          class="ml-6 text-sm font-semibold px-3 py-1 border border-slate-600 hover:bg-blue-100 text-slate-700 hover:border-blue-600 rounded-sm mt-8">
          Update
        </button>
      </div>
    </form>
  </div>

</div>
@endsection