@extends('admin-layouts')


@section('content')
<div class="overflow-auto p-2  flex justify-center mt-6">

  <div class="w-full  md:w-[800px]">
    <div class="flex justify-start mb-5">
      <form action="{{ route('results.deleteAll') }}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete all records?');">
        @csrf
        @method('DELETE')
        <button type="submit"
          class="px-2 py-1 border rounded border-red-500 text-red-600 hover:bg-red-700 hover:text-white">Delete All
          Results</button>
      </form>
    </div>

    <table class=" bg-white border border-gray-300 text-sm">
      <thead>
        <tr class="bg-green-100 border-b">
          <th class="text-left py-3 px-4 font-semibold text-sm text-gray-800">Quiz</th>
          <th class="text-left py-3 px-4 font-semibold text-sm text-gray-800">User</th>
          <th class="text-left py-3 px-4 font-semibold text-sm text-gray-800">Score</th>
          <th class="text-left py-3 px-4 font-semibold text-sm text-gray-800">Created at</th>
        </tr>
      </thead>
      <tbody>
        @foreach($results as $result)
        <tr class="hover:bg-green-50">
          <td class="py-3 px-4 border-b">{{$result->quiz->title}}</td>
          <td class="py-3 px-4 border-b">{{$result->user->name}}</td>
          <td class="py-3 px-4 border-b">{{$result->score}}</td>
          <td class="py-3 px-4 border-b">{{
            \Carbon\Carbon::parse($result->created_at)->locale('id')->translatedFormat('d M Y, H:i:s') }}</td>


        </tr>
        @endforeach

        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>


</div>
@endsection