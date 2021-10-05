<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Mijn account') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Werk uw profielgegevens en het e-mailadres van uw account bij.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Gebruikersnaam -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="Gebruikersnaam" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full disabled" wire:model.defer="state.name" autocomplete="name" disabled/>
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Voornaam -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="voornaam" value="Voornaam" />
            <x-jet-input id="voornaam" type="text" class="mt-1 block w-full" wire:model.defer="state.voornaam" autocomplete="voornaam"/>
            <x-jet-input-error for="voornaam" class="mt-2" />
        </div>  

        <!-- Achternaam -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="achternaam" value="Achternaam" />
            <x-jet-input id="achternaam" type="text" class="mt-1 block w-full" wire:model.defer="state.achternaam" autocomplete="achternaam"/>
            <x-jet-input-error for="achternaam" class="mt-2" />
        </div>  

        <!-- Adres -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="adres" value="Adres" />
            <x-jet-input id="adres" type="text" class="mt-1 block w-full" wire:model.defer="state.adres" autocomplete="adres"/>
            <x-jet-input-error for="adres" class="mt-2" />
        </div>  

        <!-- Postcode -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="postcode" value="Postcode" />
            <x-jet-input id="postcode" type="text" class="mt-1 block w-full" wire:model.defer="state.postcode" autocomplete="postcode"/>
            <x-jet-input-error for="postcode" class="mt-2" />
        </div>  

        <!-- Plaatsnaam -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="plaatsnaam" value="Plaatsnaam" />
            <x-jet-input id="plaatsnaam" type="text" class="mt-1 block w-full" wire:model.defer="state.plaatsnaam" autocomplete="plaatsnaam"/>
            <x-jet-input-error for="plaatsnaam" class="mt-2" />
        </div>  

        <!-- Land -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="land" value="Land" />
            <x-jet-input id="land" type="text" class="mt-1 block w-full" wire:model.defer="state.land" autocomplete="land"/>
            <x-jet-input-error for="land" class="mt-2" />
        </div>  

        <!-- Telefoonnummer -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telefoonnummer" value="Telefoonnummer" />
            <x-jet-input id="telefoonnummer" type="text" class="mt-1 block w-full" wire:model.defer="state.telefoonnummer" autocomplete="telefoonnummer"/>
            <x-jet-input-error for="telefoonnummer" class="mt-2" />
        </div>  

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
