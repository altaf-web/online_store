<x-layouts.frontend>
    @php
        $message = "Ok done then by";
    @endphp
    <x-alert type="error" :message="$message" class="mb-4"/>
    <x-test type="submit" :message="$message" class="mt-4">
        <x-slot:title>
            Server Error
        </x-slot:title>
        Submit here
    </x-test>


</x-layouts.frontend>
