<div id="like-button-{{ $post->id }}">
    @csrf
    @if ($post->likes()->where('user_id', Auth::id())->exists())
        <button hx-delete="{{ route('unlike.post', $post->id) }}" hx-target="#like-button-{{ $post->id }}"
            hx-swap="outerHTML" class="btn btn-primary">
            <svg class="w-6 h-6 dark:text-white" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <g id="Crewmates">
                    <path
                        d="M25.965,21.1733C25.9756,21.1149,26,21.0615,26,21v-6.0309c0.62-0.8327,1-1.8535,1-2.9691   c0-1.389-0.5712-2.6455-1.4888-3.5525C24.4882,5.8477,21.9582,4,19,4h-4c-3.8594,0-7,3.1401-7,7H7c-1.6543,0-3,1.3457-3,3v8   c0,1.6543,1.3457,3,3,3h1.1011c0.4647,2.2793,2.4845,4,4.8989,4h4c0.7711,0,1.468-0.3005,2-0.7803   c0.0171,0.0154,0.0358,0.0289,0.0532,0.0439C19.171,28.6848,19.5409,29,20,29h5c1.6543,0,3-1.3457,3-3v-2   C28,22.6852,27.1445,21.5776,25.965,21.1733z M8,23H7c-0.5518,0-1-0.4487-1-1v-8c0-0.5513,0.4482-1,1-1h1V23z M25,12   c0,1.6543-1.3457,3-3,3h-4c-1.6543,0-3-1.3457-3-3s1.3457-3,3-3h4C23.6543,9,25,10.3457,25,12z M26,26c0,0.5513-0.4482,1-1,1h-4   c-0.5518,0-1-0.4487-1-1v-2c0-1.6543-1.3457-3-3-3h-1c-0.5527,0-1,0.4478-1,1s0.4473,1,1,1h1c0.5518,0,1,0.4487,1,1v2   c0,0.5513-0.4482,1-1,1h-4c-1.6543,0-3-1.3457-3-3V12v-1c0-2.7568,2.2432-5,5-5h4c1.1193,0,2.1489,0.3755,2.9824,1H18   c-2.7568,0-5,2.2432-5,5s2.2432,5,5,5h4c0.7118,0,1.3864-0.1545,2-0.4238V21h-1c-0.5527,0-1,0.4478-1,1s0.4473,1,1,1h2   c0.5518,0,1,0.4487,1,1V26z M22,11c0-0.5523,0.4477-1,1-1s1,0.4477,1,1c0,0.5522-0.4477,1-1,1S22,11.5522,22,11z M18,10h2   c0.5527,0,1,0.4478,1,1s-0.4473,1-1,1h-2c-0.5527,0-1-0.4478-1-1S17.4473,10,18,10z" />
                </g>
            </svg>
        </button>
    @else
        <button hx-post="{{ route('like.post', $post->id) }}" hx-target="#like-button-{{ $post->id }}"
            hx-swap="outerHTML" class="btn btn-outline btn-primary">
            <svg fill="#7480ff" class="w-6 h-6 text-[#7480ff] dark:text-white" viewBox="0 0 32 32"
                xmlns="http://www.w3.org/2000/svg">
                <g id="Crewmates">
                    <path
                        d="M25.965,21.1733C25.9756,21.1149,26,21.0615,26,21v-6.0309c0.62-0.8327,1-1.8535,1-2.9691   c0-1.389-0.5712-2.6455-1.4888-3.5525C24.4882,5.8477,21.9582,4,19,4h-4c-3.8594,0-7,3.1401-7,7H7c-1.6543,0-3,1.3457-3,3v8   c0,1.6543,1.3457,3,3,3h1.1011c0.4647,2.2793,2.4845,4,4.8989,4h4c0.7711,0,1.468-0.3005,2-0.7803   c0.0171,0.0154,0.0358,0.0289,0.0532,0.0439C19.171,28.6848,19.5409,29,20,29h5c1.6543,0,3-1.3457,3-3v-2   C28,22.6852,27.1445,21.5776,25.965,21.1733z M8,23H7c-0.5518,0-1-0.4487-1-1v-8c0-0.5513,0.4482-1,1-1h1V23z M25,12   c0,1.6543-1.3457,3-3,3h-4c-1.6543,0-3-1.3457-3-3s1.3457-3,3-3h4C23.6543,9,25,10.3457,25,12z M26,26c0,0.5513-0.4482,1-1,1h-4   c-0.5518,0-1-0.4487-1-1v-2c0-1.6543-1.3457-3-3-3h-1c-0.5527,0-1,0.4478-1,1s0.4473,1,1,1h1c0.5518,0,1,0.4487,1,1v2   c0,0.5513-0.4482,1-1,1h-4c-1.6543,0-3-1.3457-3-3V12v-1c0-2.7568,2.2432-5,5-5h4c1.1193,0,2.1489,0.3755,2.9824,1H18   c-2.7568,0-5,2.2432-5,5s2.2432,5,5,5h4c0.7118,0,1.3864-0.1545,2-0.4238V21h-1c-0.5527,0-1,0.4478-1,1s0.4473,1,1,1h2   c0.5518,0,1,0.4487,1,1V26z M22,11c0-0.5523,0.4477-1,1-1s1,0.4477,1,1c0,0.5522-0.4477,1-1,1S22,11.5522,22,11z M18,10h2   c0.5527,0,1,0.4478,1,1s-0.4473,1-1,1h-2c-0.5527,0-1-0.4478-1-1S17.4473,10,18,10z" />
                </g>
            </svg>
        </button>
    @endif
    <span>{{ $post->likes()->count() }} Likes</span>
</div>
