@extends('layouts')

@section('content')
<div class="flex justify-center">
  <div>

    <div class="flex flex-col gap-4 mt-6">
      <a href="{{route('quiz.index')}}">
        <div
          class="mt-3 text-center text-blue-700 py-2 border border-blue-500 rounded hover:text-white hover:bg-blue-700 w-56">
          Quiz

        </div>
      </a>


    </div>


  </div>


</div>


@endsection