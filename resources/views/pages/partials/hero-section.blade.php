<div id="grid" class="hero flex w-full flex-col items-center gap-[48px] bg-bg-primary pt-[8rem]">

  <div class="flex flex-col items-center gap-[32px]">
    <h1 class="text-[60px] font-semibold text-fg-primary">Smart Study with AI Summaries & Quizzes</h1>
    <p class="font-regular text-center text-[20px] text-fg-tertiary">
      Quickly summarize lecture and create quizzes with power of AI<br>
      everything you need to study smarter and faster⚡
    </p>
  </div>

  <div class="flex flex-col items-center gap-[60px]">
    @auth
      <a class="btn rounded-[10px] border-[2px] border-primary bg-primary text-[18px] font-semibold text-[#FFFFFF] hover:border-primary hover:bg-secondary"
        href="{{ route('dashboard') }}">get started for free</a>
    @endauth

    @guest
      <a class="btn rounded-[10px] border-[2px] border-primary bg-primary text-[18px] font-semibold text-[#FFFFFF] hover:border-primary hover:bg-secondary"
        href="{{ route('login') }}">get started for free</a>
    @endguest

    <img class="h-auto max-w-5xl rounded-xl border border-gray-200 shadow-lg"
      src="{{ asset('assets/lakhess-app.test_dashboard.png') }}" alt="imge not suport its Brouser">
  </div>

</div>
