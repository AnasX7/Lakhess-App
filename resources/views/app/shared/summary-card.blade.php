{{-- !: Change this! --}}
<div class="w-64 h-64 shadow-xl card card-compact bg-base-100">
    <figure class="h-32">
        <img class="object-cover w-full h-full"
            src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes"
            style="max-height: 12rem;" />
    </figure>
    <div class="flex flex-col justify-between card-body">
        <h2 class="text-sm card-title">{{ $summary->title }}</h2>
        <p class="text-xs">{{ $summary->content }}</p>
        <div class="justify-end card-actions">
            <button class="btn btn-primary btn-sm">Read more</button>
        </div>
    </div>
</div>
