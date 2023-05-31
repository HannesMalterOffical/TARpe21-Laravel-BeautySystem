<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('services.store') }}">
            @csrf
            <input type="text"
                   name="name"
                   value="{{old('name')}}"
                   placeholder="{{__('Name the service')}}"
                   class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <input type="number"
                   min="0"
                   name="basePrice_cents"
                   value="{{old('basePrice_cents')}}"
                   placeholder="{{__('Base price in cents')}}"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <input type="number"
                   name="duration_minutes"
                   value="{{old('duration_minutes')}}"
                   placeholder="{{__('Duration of the Service')}}"
                   class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <textarea
                name="description"
                placeholder="{{ __('Add a description for a service') }}"
                class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Add Service') }}</x-primary-button>
        </form>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($services as $service)
                <div class="p-6 flex space-x-2">
                    <div class="flex-1">
                        <div class="flex rows items-center">
                            <div>
                                <span class="text-gray-800">Name: {{ $service->name }}</span>
                                {{-- <small class="ml-2 text-sm text-gray-600">{{ $service->created_at->format('j M Y, g:i a') }}</small> --}}
                                @unless ($service->created_at->eq($service->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            <div>
                                <span class="ml-1 text-gray-800">Base Price: {{ $service->basePrice_cents / 100 }}€</span>
                                <span class="ml-2 text-sm text-gray-600">Duration: {{ $service->duration_minutes }}minutes</span>
                            </div>
                            @if ($service->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('services.edit', $service)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        @endif
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
