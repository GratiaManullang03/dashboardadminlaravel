@props(['headers' => []])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left">
        <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-700">
            <tr>
                @foreach($headers as $header)
                    <th scope="col" class="px-6 py-3">
                        {{ $header }}
                    </th>
                @endforeach
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>