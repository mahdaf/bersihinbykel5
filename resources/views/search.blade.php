<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Campaign</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.navbar')
    <div class="mx-20 pt-20 flex items-center gap-4 ">
        @include('components.searchbar')
        @include('components.filterbutton')
    </div>

    <main class="mx-20 pt-10">
        @if(isset($query))
            <h1 class="text-[32px] font-[700] text-black mb-4" style="font-family: 'Poppins', sans-serif !important;">
                Hasil Pencarian: "{{ $query }}" {{ $campaigns->total() }} Campaign
            </h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-7">
                @forelse($campaigns as $campaign)
                    @include('components.campaign-item', ['campaign' => $campaign])
                @empty
                    <div class="col-span-3 text-center text-gray-500 py-20">
                        Tidak ditemukan campaign yang sesuai dengan pencarian "{{ $query }}"
                    </div>
                @endforelse
            </div>

            @if($campaigns->hasPages())
                <div class="mt-8 flex justify-center">
                    <div class="flex space-x-2">
                        {{-- Previous Page Link --}}
                        @if($campaigns->onFirstPage())
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                Previous
                            </span>
                        @else
                            <a href="{{ $campaigns->previousPageUrl() }}" class="px-4 py-2 text-[#810000] bg-white border border-[#810000] rounded-lg hover:bg-[#810000] hover:text-white transition-colors">
                                Previous
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach($campaigns->getUrlRange(1, $campaigns->lastPage()) as $page => $url)
                            @if($page == $campaigns->currentPage())
                                <span class="px-4 py-2 text-white bg-[#810000] rounded-lg">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="px-4 py-2 text-[#810000] bg-white border border-[#810000] rounded-lg hover:bg-[#810000] hover:text-white transition-colors">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if($campaigns->hasMorePages())
                            <a href="{{ $campaigns->nextPageUrl() }}" class="px-4 py-2 text-[#810000] bg-white border border-[#810000] rounded-lg hover:bg-[#810000] hover:text-white transition-colors">
                                Next
                            </a>
                        @else
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                Next
                            </span>
                        @endif
                    </div>
                </div>
            @endif
        @endif
    </main>
</body>
</html>
