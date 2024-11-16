<div id="grid" class="hero flex w-full flex-col items-center gap-[48px] bg-bg-primary pt-[6rem]">

  <div class="flex flex-col items-center gap-[32px]">
    {{-- <h1 class="text-[60px] font-semibold text-fg-primary">Smart Study with AI Summaries & Quizzes</h1> --}}

    <h1 x-data="{
        startingAnimation: { opacity: 0, scale: 4 },
        endingAnimation: { opacity: 1, scale: 1, stagger: 0.07, duration: 1, ease: 'expo.out' },
        addCNDScript: true,
        animateText() {
            $el.classList.remove('invisible');
            gsap.fromTo($el.children, this.startingAnimation, this.endingAnimation);
        },
        splitCharactersIntoSpans(element) {
            text = element.innerHTML;
            modifiedHTML = [];
            for (var i = 0; i < text.length; i++) {
                attributes = '';
                if (text[i].trim()) { attributes = 'class=\'inline-block\''; }
                modifiedHTML.push('<span ' + attributes + '>' + text[i] + '</span>');
            }
            element.innerHTML = modifiedHTML.join('');
        },
        addScriptToHead(url) {
            script = document.createElement('script');
            script.src = url;
            document.head.appendChild(script);
        }
    }" x-init="splitCharactersIntoSpans($el);
    if (addCNDScript) {
        addScriptToHead('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js');
    }
    gsapInterval = setInterval(function() {
        if (typeof gsap !== 'undefined') {
            animateText();
            clearInterval(gsapInterval);
        }
    }, 5);" class="invisible block text-[60px] font-semibold text-fg-primary">
    Smart Study with AI Summaries and Quizzes
    </h1>

    <p class="font-regular text-center text-[20px] text-fg-tertiary">
      Quickly summarize lecture and create quizzes with power of AI<br>
      everything you need to study smarter and faster⚡
    </p>
  </div>

  <div class="flex flex-col items-center gap-[60px]">
    <a class="btn rounded-[10px] border-[2px] border-primary bg-primary text-[18px] font-semibold text-[#FFFFFF] hover:border-primary hover:bg-secondary"
      href="#">get started for free</a>

    <img class="w-[1280px] px-[32px]" src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
      alt="imge not suport its Brouser">
  </div>

</div>
