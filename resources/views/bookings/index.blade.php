<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        {{-- <form method="POST" action="{{ route('services.store') }}">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Name the service') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <input type="number" name="basePrice_cents" value="{{ old('basePrice_cents') }}"
                placeholder="{{ __('Base price in cents') }}"
                class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('basePrice_cents')" class="mt-2" />
            <input type="number" name="duration_minutes" value="{{ old('duration_minutes') }}"
                placeholder="{{ __('Service duration in minutes') }}"
                class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('duration_minutes')" class="mt-2" />
            <textarea name="description" placeholder="{{ __('Add a description for the service.') }}"
                class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Add Service') }}</x-primary-button>
        </form> --}}
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($bookings as $booking)
            <div class="flex-1">
                <div>
                    <div class="flex justify-between items-center">
                    <div class="ml-2 text-sm text-gray-600">
                        Server:<span class="text-lg text-gray-800"> {{ $booking->server->name }}</span><br>
                        @if (isset($booking->client))
                        Client:<span class="text-lg text-gray-800"> {{ $booking->client->name }}</span>
                        @endif
                        <small class="ml-2 text-sm text-gray-600">{{ $booking->created_at->format('j M Y, g:i a') }}</small>
                        @unless ($booking->created_at->eq($booking->updated_at))
                        <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                        @endunless
                    </div>
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('bookings.edit', $booking)">
                                {{ __('Edit') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('bookings.destroy', $booking) }}">
                                @csrf
                                @method('delete')
                                <x-dropdown-link :href="route('bookings.destroy', $booking)" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Delete') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    </div>
                    @if (isset($booking->service))
                        <div>
                        <small class="ml-2 text-sm text-gray-600">Duration: {{ $booking->service->duration_minutes }}minutes.</small>
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
