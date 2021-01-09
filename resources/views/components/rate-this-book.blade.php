
@if ($rating)
    <p class="text-xs font-light font-karla text-gray-500 pt-2 pb-1 text-center">Your Book Rating</p>
    <div class="rating flex flex-row-reverse justify-center">
        @for ($i = 5; $i > $rating; $i--)
            <a href="">
                <svg class="fill-current text-gray-300" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        @endfor
        @for ($i = 0; $i < $rating; $i++)
            <a href="">
                <svg class="fill-current text-gold" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        @endfor
    </div>
@else
    <p class="text-xs font-light font-karla text-gray-500 pt-2 pb-1 text-center">Rate this book</p>
    <div class="rating flex flex-row-reverse justify-center">
        @for ($i = 5; $i > 0; $i--)
            <a href="">
                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        @endfor
    </div>
@endif
