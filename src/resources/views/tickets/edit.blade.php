<x-app-layout> 
    <x-container>

        <form method="POST" action="{{ route('tickets.update', $ticket) }}">
            @csrf
            @method('PUT')
            <x-header-section>
                <x-slot name="heading">
                    {{ $ticket->title }}
                </x-slot>
                <x-slot name="subHeading">
                    {{ 'Created on ' . $ticket->created_at->toFormattedDateString() }}
                </x-slot>
            </x-header-section>

            <div class="grid sm:grid-cols-3 sm:gap-6 sm:mt-6 mt-12">
                <div class="col-span-1 sm:col-span-2">
                    <x-panel class="h-full">
                        <x-form-group>
                            <x-slot name="heading">Title</x-slot>
                            <x-slot name="description">
                                This information will be displayed publicly so be careful what you share.
                            </x-slot>
                            <x-input id="title" class="block mt-2 w-full"
                                    type="text"
                                    name="title"
                                    value="{{ old('title', $ticket->title) }}"
                                    required 
                            />
                        </x-form-group>
                        <x-form-group class="mt-12">
                            <x-slot name="heading">Description</x-slot>
                            <x-slot name="description">
                                This information will be displayed publicly so be careful what you share.
                            </x-slot>
                            <textarea 
                                id="description" 
                                name="description" rows="7" 
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-2 block w-full sm:text-sm border border-gray-300 rounded-md" 
                            >{{ old('description', $ticket->description) }}</textarea>
                        </x-form-group>
                    </x-panel>
                </div>
                <div class="mt-4 sm:mt-0 col-span-1">
                    <x-ticket-info :ticket="$ticket"/>
                </div>
            </div>
        </form>
    </x-container>
</x-app-layout>