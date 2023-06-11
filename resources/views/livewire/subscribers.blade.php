<div>
    <div class="p-6 text-gray-900">
        <p class="mb-6 text-2xl font-bold text-gray-600 underline">
            Subscribers
        </p>

        <div class="px-8">
            <x-text-input class="float-right w-1/3 px-5 py-3 mb-4 border border-blue-400 rounded-lg" type="text"
                name="search" placeholder="Search for a subscriber" wire:model="search">
            </x-text-input>
            @if ($subscribers->isEmpty())
                <div class="flex w-full p-5 bg-red-100 rounded-lg">
                    <p class="text-red-400">
                        No subscribers found.
                    </p>
                </div>
            @else
                <table class=w-full>
                    <thead class="text-indigo-600 border-b-2 border-gray-300">
                        <tr>
                            <th class="px-6 py-3 text-left">
                                Email
                            </th>
                            <th class="px-6 py-3 text-left">
                                Verified
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscribers as $subscriber)
                            <tr class="text-sm text-indigo-900 border-b border-gray-400">
                                <td class="px-6 py-4">
                                    {{ $subscriber->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ optional($subscriber->email_verified_at)->diffForHumans() ?? 'Never' }}
                                </td>
                                <td>
                                    <x-danger-button wire:click="delete({{ $subscriber->id }})">
                                        Delete
                                    </x-danger-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
