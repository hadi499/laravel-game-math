@extends('admin-layouts')

@section('content')
<div class="flex flex-col mt-10 justify-center items-center">



  <div>
    <form method="POST" action="{{ route('admin.quiz.store') }}" class=" w-[500px]">
      @csrf
      <div class="border border-slate-500 rounded shadow-sm flex flex-col p-6  gap-3">
        <p class="text-center text-2xl font-semibold mb-3">Create Quiz</p>
        <div class="flex flex-col gap-2">
          <label for="title" class="font-semibold">Title</label>
          <input type="text" name="title"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="title">
        </div>
        <div class="flex flex-col gap-2">
          <label for="topic" class="font-semibold">Topic</label>
          <input type="text" name="topic"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="topic">
        </div>
        <div class=" flex flex-col gap-2">
          <label for="level" class="font-semibold">Level</label>
          <input type="text" name="level"
            class="w-1/2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="level">
        </div>
        <div class=" flex flex-col gap-2">
          <label for="time" class="font-semibold">Time</label>
          <input type="number" name="time"
            class="w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="time">
        </div>
        <div class=" flex flex-col gap-2">
          <label for="number_of_questions" class="font-semibold">Number of questions</label>
          <input type="number" name="number_of_questions"
            class="w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required
            id="number_of_questions">
        </div>

      </div>
      <div class="flex justify-end">
        <button type=" submit"
          class="mr-3 texl-sm font-semibold px-3 py-1 border border-slate-600 hover:bg-blue-100 text-slate-700 hover:border-blue-600  rounded-sm mt-8">Save</button>

      </div>
    </form>

  </div>


</div>
</div>

@endsection