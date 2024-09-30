@extends('layouts')

@section('content')
<div class="flex justify-center p-4">
  <div class="">
    <div class="flex justify-end mb-6">

      <div id="timer-medium"
        class="ml-auto text-center w-24 text-xl font-semibold text-red-600 border border-red-600 p-2">
      </div>

    </div>
    <div class="mb-5 text-center text-2xl font-semibold">{{ $quiz->title }}</div>
    <form action="{{ route('quiz.submitMedium', $quiz->id) }}" method="POST" id="form-start-medium">
      @csrf

      <div class="flex justify-evenly flex-wrap gap-3 py-5 border w-full lg:w-[1000px]  shadow-lg">
        @foreach($questions as $question)
        <div class="border" style="width: 200px">
          <div class="border mb-3 " style="background-color: #FFF5CD">
            <h5 class="text-center my-3 font-semibold text-xl">{{ $question->question_text }} = ...</h5>

          </div>
          <div class="ml-8 mb-3 text-lg">
            <div class="space-x-2 mb-2">
              <input class="" type="radio" id="{{ $question->question_text }}-{{ $question->option_a }}"
                name="answers[{{ $question->id }}]" value="{{ $question->option_a}}">
              <label class="" for="{{ $question->question_text }}-{{ $question->option_a }}">{{
                $question->option_a }}</label>
            </div>
            <div class="space-x-2 mb-2">
              <input type="radio" id="{{ $question->question_text }}-{{ $question->option_b }}"
                name="answers[{{ $question->id }}]" value="{{ $question->option_b}}">
              <label for="{{ $question->question_text }}-{{ $question->option_b }}">{{
                $question->option_b }}</label>
            </div>
            <div class="space-x-2">
              <input type="radio" id="{{ $question->question_text }}-{{ $question->option_c }}"
                name="answers[{{ $question->id }}]" value="{{ $question->option_c}}">
              <label for="{{ $question->question_text }}-{{ $question->option_c }}">{{
                $question->option_c}}</label>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <div class="mt-8  flex justify-end">
        <a href="{{route('quiz.medium.view')}}"
          class="bg-slate-700 px-2 py-2 shadow-lg rounded-sm text-white text-sm font-semibold hover:bg-slate-600"
          type="submit">Back</a>
        <button
          class="ml-12 bg-blue-700 px-2 py-2 shadow-lg rounded-sm text-white text-sm font-semibold hover:bg-blue-600"
          type="submit">Submit</button>
      </div>
    </form>

  </div>
</div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', (event) => {

    const logoutButton = document.getElementById('navbar-logout'); 
    if (logoutButton) {
        logoutButton.style.marginTop = '16px'; // Mengembalikan padding ke default
    }
      // Ambil waktu dari variabel PHP ($quiz->time dalam detik)
      let time = {{ $quiz->time }}; // Sudah dalam detik
      const timerElement2 = document.getElementById('timer-medium');
      const formElement2 = document.getElementById('form-start-medium'); // Form yang akan disubmit

      // Fungsi untuk mengupdate timer
      const updateTimer = () => {
          const minutes = Math.floor(time / 60);
          const seconds = time % 60;

          // Format tampilannya agar selalu ada dua digit untuk detik
          timerElement2.innerHTML = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

          if (time === 0) {
              clearInterval(timerInterval);          
              formElement2.submit(); 
          }

          time--; // Kurangi waktu setiap detik
      };

      // Jalankan fungsi update timer setiap 1 detik
      const timerInterval = setInterval(updateTimer, 1000);
      updateTimer(); // Menampilkan waktu saat pertama kali
  });
</script>