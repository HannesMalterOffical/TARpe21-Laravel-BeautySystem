<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('services.update', $chirp) }}">
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
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('services.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
