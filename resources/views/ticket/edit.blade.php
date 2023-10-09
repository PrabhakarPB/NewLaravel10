<x-app-layout>
    <div class="text-white">

        <x-guest-layout>
            <h1 class="text-white text-lg font-bold text-center">Update Support Ticket</h1>

            <form method="POST" action="{{ route('ticket.update',$ticket->id) }}" enctype="multipart/form-data">

                @csrf
                @method('patch')

                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" value="{{$ticket->title}}" type="text" name="title" placeholder="Add Title" autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea default="Hello World" name="description" id="description" cols="45" rows="2" placeholder="Add Description">{{$ticket->title}}</x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    @if($ticket->attachment)
                    <a href="{{" /storage/$ticket->attachment"}}" class="text-white" target=" _blank">View Attachment</a>
                    @endif
                    <x-input-label for="attachment" :value="__('Attachment (if any)')" />

                    <x-file-input name="attachment" id="attachment"></x-file-input>
                    <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-3">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </x-guest-layout>
    </div>

</x-app-layout>