<x-app-layout>
    <div class="text-white">
        <x-guest-layout>
            <h1 class="text-white text-lg font-bold text-center">Create Support Ticket</h1>


            <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" placeholder="Add Title" autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea default="Hello World" name="description" id="description" cols="45" rows="2" placeholder="Add Description" value=""></x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Attachment (if any)')" />
                    <x-file-input name="attachment" id="attachment"></x-file-input>
                    <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-3">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </x-guest-layout>
    </div>

</x-app-layout>