<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($bookings as $booking)
            <div class="flex-1">
                <div>
                    <div class="flex justify-between items-center">
                    <div class="ml-2 text-sm text-gray-600">
                        Booking Time:<span class="text-lg text-gray-800"> {{ $booking->booking_time }}</span><br>
                        Server:<span class="text-lg text-gray-800"> {{ $booking->server->name }}</span><br>
                        @if (isset($booking->client))
                        Client:<span class="text-lg text-gray-800"> {{ $booking->client->name }}</span>
                        @endif
                        {{-- <small class="ml-2 text-sm text-gray-600">{{ $booking->created_at->format('j M Y, g:i a') }}</small>
                        @unless ($booking->created_at->eq($booking->updated_at))
                        <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                        @endunless --}}
                    </div>
                    <div class="mr-2 text-sm text-gray-600">
                    <form method="POST" action="{{ route('clients.update', $booking) }}">
                        @csrf
                        @method('patch')
                        <x-primary-button>{{ __('Book now!') }}</x-primary-button>
                    </form>
                    </div>
                    {{-- @if ($booking->client->is(auth()->user()))
                    <a href="{{route('clients.destroy', $booking)}}">
                        {{ __('Cancel booking') }}
                    </a>
                    @endif --}}
                    </div>
                    @if (isset($booking->service))
                    <div class="ml-2 text-sm text-gray-600">
                        Service:<span class="text-lg text-gray-800"> {{ $booking->service->name }}</span><br>
                        <small class="text-sm text-gray-600">Duration: {{ $booking->service->duration_minutes }}minutes.</small>
                    </div>
                    <div class="ml-2 text-sm text-gray-600">
                        Base Price:<span class="text-lg text-gray-800"> {{ $booking->service->basePrice_cents / 100 }}€</span>
                    </div>
                    <p class="ml-2 my-4 text-gray-900">{{ $booking->service->description }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
