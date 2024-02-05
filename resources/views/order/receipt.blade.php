<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customer: {{ $buyer }}
        </h2>
    </x-slot>

    <table class="w-full text-left table-auto min-w-max">
        <thead>
            <tr>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    No
                    </p>
                </th>

                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Category
                    </p>
                </th>

                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Fruit
                    </p>
                </th>

                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Unit
                    </p>
                </th>

                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Price
                    </p>
                </th>

                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Quantity
                    </p>
                </th>

                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Amount
                    </p>
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach($items as $key => $item)
            <tr>
                <td class="p-4 border-b border-blue-gray-50">
                    {{$key+1}}
                </td>

                <td class="p-4 border-b border-blue-gray-50">
                    {{$item['category']}}
                </td>

                <td class="p-4 border-b border-blue-gray-50">
                    {{$item['fruit']}}
                </td>

                <td class="p-4 border-b border-blue-gray-50">
                    {{$item['unit']}}
                </td>

                <td class="p-4 border-b border-blue-gray-50">
                    {{$item['price']}}
                </td>

                <td class="p-4 border-b border-blue-gray-50">
                    {{$item['quantity']}}
                </td>

                <td class="p-4 border-b border-blue-gray-50">
                    {{$item['amount']}}
                </td>
            </tr>
            @endforeach

            <tr>
                <td class="p-4 border-b border-blue-gray-50"></td>
                <td class="p-4 border-b border-blue-gray-50"></td>
                <td class="p-4 border-b border-blue-gray-50"></td>
                <td class="p-4 border-b border-blue-gray-50"></td>
                <td class="p-4 border-b border-blue-gray-50"></td>

                <td class="p-4 border-b border-blue-gray-50">
                    Total: 
                </td>
                <td class="p-4 border-b border-blue-gray-50">
                    {{$total}}
                </td>
            </tr>
        </tbody>
    </table>

</x-app-layout>
