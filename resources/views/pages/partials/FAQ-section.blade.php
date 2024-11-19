<section class="flex flex-col items-center gap-10 mb-20">

    <div class="flex flex-col items-center gap-2 px-20">
        <h2 class="text-xl font-bold text-primary">FAQ</h2>
        <h3 class="text-4xl font-bold text-fg-primary">Frequently Asked Questions</h3>
        <div class="px-20 pt-2 mx-6 text-xl text-center text-fg-tertiary w-15px">
            <p>Everything you need to know about Lakhess, features, and support </p>
        </div>
    </div>

    <div  x-data="{
        activeAccordion: '',
        setActiveAccordion(id) {
            this.activeAccordion = (this.activeAccordion == id) ? '' : id
        }
    }" class="relative w-full max-w-2xl mx-auto text-lg ">

        <div x-data="{ id: $id('accordion') }"
            :class="{
                'border-neutral-200/60 text-neutral-800': activeAccordion ==
                    id,
                'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
            }"
            class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
            <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                <span>How does Lakhess generate summaries and quizzes?</span>
                <div :class="{ 'rotate-90': activeAccordion == id }"
                    class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                    <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                    <div :class="{ 'rotate-90': activeAccordion == id }"
                        class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                    </div>
                </div>
            </button>
            <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                    Lakhess uses an AI-powered model to analyze your lecture PDFs and create concise summaries and
                    relevant quizzes to help you retain key information.
                </div>
            </div>
        </div>
        <div x-data="{ id: $id('accordion') }"
            :class="{
                'border-neutral-200/60 text-neutral-800': activeAccordion ==
                    id,
                'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
            }"
            class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
            <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                <span>Is there a limit on the number of folders I can create?</span>
                <div :class="{ 'rotate-90': activeAccordion == id }"
                    class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                    <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                    <div :class="{ 'rotate-90': activeAccordion == id }"
                        class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                    </div>
                </div>
            </button>
            <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                    No, you can create as many folders as you need. Organize your summaries and quizzes by topics or
                    subjects to keep your study materials easy to navigate.
                </div>
            </div>
        </div>
        <div x-data="{ id: $id('accordion') }"
            :class="{
                'border-neutral-200/60 text-neutral-800': activeAccordion ==
                    id,
                'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
            }"
            class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
            <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                <span>Can I mark multiple items as favorites?</span>
                <div :class="{ 'rotate-90': activeAccordion == id }"
                    class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                    <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                    <div :class="{ 'rotate-90': activeAccordion == id }"
                        class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                    </div>
                </div>
            </button>
            <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                    Yes, you can mark any number of summaries or quizzes as favorites. Access all your favorites
                    conveniently from the "Favorite" folder.
                </div>
            </div>
        </div>

        <div x-data="{ id: $id('accordion') }"
            :class="{
                'border-neutral-200/60 text-neutral-800': activeAccordion ==
                    id,
                'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
            }"
            class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
            <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                <span>Is my data secure on Lakhess?</span>
                <div :class="{ 'rotate-90': activeAccordion == id }"
                    class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                    <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                    <div :class="{ 'rotate-90': activeAccordion == id }"
                        class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                    </div>
                </div>
            </button>
            <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                    Your data security is our priority. We employ robust security measures to ensure that your uploaded
                    content, summaries, and quizzes are kept safe.
                </div>
            </div>
        </div>

        <div x-data="{ id: $id('accordion') }"
            :class="{
                'border-neutral-200/60 text-neutral-800': activeAccordion ==
                    id,
                'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
            }"
            class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
            <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                <span>Can I edit a summary or quiz after it’s generated?</span>
                <div :class="{ 'rotate-90': activeAccordion == id }"
                    class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                    <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                    <div :class="{ 'rotate-90': activeAccordion == id }"
                        class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                    </div>
                </div>
            </button>
            <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                    Currently, summaries and quizzes are generated by the AI model and saved as-is. We’re working on
                    features to allow editing and customization in future updates.
                </div>
            </div>
        </div>

        <div x-data="{ id: $id('accordion') }"
            :class="{
                'border-neutral-200/60 text-neutral-800': activeAccordion ==
                    id,
                'border-transparent text-neutral-600 hover:text-neutral-800': activeAccordion != id
            }"
            class="duration-200 ease-out bg-white border rounded-md cursor-pointer group" x-cloak>
            <button @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full px-5 py-4 font-semibold text-left select-none">
                <span>How do I delete a folder or item?</span>
                <div :class="{ 'rotate-90': activeAccordion == id }"
                    class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                    <div class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                    <div :class="{ 'rotate-90': activeAccordion == id }"
                        class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full">
                    </div>
                </div>
            </button>
            <div x-show="activeAccordion==id" x-collapse x-cloak>
                <div class="p-5 pt-0 opacity-70">
                    You can delete any folder, summary, or quiz directly from your dashboard. Just select the item you
                    want to remove and click "Delete."
                </div>
            </div>
        </div>
    </div>

    <div class=" flex flex-col max-w-5xl  w-full justify-center items-center gap-6 bg-bg-active py-2  ">
        <div class="avatar-group -space-x-6 rtl:space-x-reverse pt-4  ">
           
            <div class="avatar">
                <div class="w-16 h-16 overflow-hidden rounded-full ">
                  <img src="{{ asset('assets/ahmed.png') }}" />
                </div>
              </div>
              <div class="avatar">
                <div class="w-16 h-16 overflow-hidden rounded-full ">
                  <img src="{{ asset('assets/hassan.jpeg') }}" />
                </div>
              </div>
            <div class="avatar">
              <div class="w-16 h-16 overflow-hidden rounded-full ">
                <img src="{{ asset('assets/odi.jpg') }}" />
              </div>
            </div>
            <div class="avatar">
              <div class="w-16 h-16 overflow-hidden rounded-full ">
                <img src="{{ asset('assets/anas.jpg') }}" />
              </div>
            </div>
            <div class="avatar">
              <div class="w-16 h-16 overflow-hidden rounded-full ">
                <img src="{{ asset('assets/haneen.jpg') }}" />
              </div>
            </div>

        </div>  
        <div class="flex flex-col items-center gap-3">
            <h3 class="text-black font-bold">Still Have Question?</h3>
            <p class="text-gray-400"> Can't Find The Answer You're looking For? Pleas Chat To Our Frindly Team.  </p>
        </div>
        <a class="btn btn-active bg-primary border-primary text-white hover:bg-primary hover:border-primary my-3 "  href=" mailto:anasssalem.aa@gmail.com">Get in touch</a>
    </div>


</section>
