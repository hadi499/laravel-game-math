@extends('layouts')

@section('content')
<div class="flex justify-center mb-8 p-6">
  <div>
    <p
      class="text-center text-2xl my-6 font-semibold {{ $score == 100 ? 'text-green-500' : ($score < 100 ? 'text-red-500' : '') }}">
      Nilai Anda: {{ $score }}
    </p>


    @if(count($incorrectQuestions) > 0)
    <div class="text-center text-xl font-semibold">Jawaban salah:</div>

    @foreach($incorrectQuestions as $incorrect)

    <div class="flex p-4 gap-2 bg-red-100 border border-red-500 text-lg font-semibold mb-3 mt-3">
      <div>{{ $incorrect['question'] }} | </div>
      <div>{{ $incorrect['your_answer'] }}</div>

    </div>

    @endforeach
    @else
    <p class="text-xl font-semibold text-green-600">Selamat! Anda menjawab semua pertanyaan dengan benar!</p>
    @endif






    <div class="mt-8">

      <a class="bg-blue-700 px-2 py-2 shadow-lg rounded-lg text-white text-sm font-semibold hover:bg-blue-600"
        href="{{ route('quiz.mediumStart', $quiz->id) }}">Kembali ke Kuis</a>

    </div>

  </div>

</div>
@endsection