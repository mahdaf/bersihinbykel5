{{-- List Komentar --}}
<div id="commentsList">
    @forelse($komentar as $k)
        <div class="flex items-start mb-4">
            <img src="{{ filter_var($k->akun->fotoProfil, FILTER_VALIDATE_URL) ? $k->akun->fotoProfil : asset('storage/' . $k->akun->fotoProfil) }}"
                 class="w-10 h-10 rounded-full mr-3" alt="Avatar">
            <div>
                <div class="flex items-center gap-2">
                    <span class="font-semibold text-sm">{{ $k->akun?->namaPengguna ?? '-' }}</span>
                    <span class="text-xs text-gray-400">• {{ $k->updated_at->diffForHumans() }}</span>
                </div>
                <div class="text-sm text-gray-700 mb-1">{{ $k->komentar }}</div>
                <button
                    type="button"
                    class="like-btn mt-1 text-xs flex items-center gap-1"
                    data-id="{{ $k->id }}"
                    data-liked="{{ isset($k->likes) && $k->likes->contains(auth()->id()) ? '1' : '0' }}"
                >
                    @php
                        $liked = isset($k->likes) && $k->likes->contains(auth()->id());
                    @endphp
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24"
                         class="w-5 h-5 transition-colors duration-200"
                         fill="{{ $liked ? 'red' : 'none' }}"
                         stroke="{{ $liked ? 'red' : '#171717' }}"
                         stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.364l-7.682-7.682a4.5 4.5 0 010-6.364z" />
                    </svg>
                    <span class="like-count text-[#171717]">{{ isset($k->likes) ? $k->likes->count() : 0 }}</span>
                </button>
            </div>
        </div>
    @empty
        <div class="text-gray-400 text-sm">Belum ada komentar.</div>
    @endforelse
</div>