@props(['number', 'label', 'link', 'svgIcon', 'iconColor' => 'text-gray-800', 'iconBgColor' => 'bg-gray-300'])


<div class="bg-white rounded-xl shadow h-40">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-8">
                        <div class="text-right">
                            <h2 class="text-3xl font-bold text-gray-900">{{ $number }}</h2>
                            <p class="text-sm whitespace-nowrap text-gray-500 mt-1">{{ $label }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg {{ $iconBgColor }} flex items-center justify-center">
                            <svg class="w-6 h-6 {{ $iconColor }} " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="{{ $svgIcon }}" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex justify-start" dir="ltr">
                        <a href="{{ $link }}"
                            class="flex items-center gap-1 text-sm font-medium text-purple-600 hover:text-purple-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            عرض الكل
                        </a>
                    </div>
                </div>
            </div>
