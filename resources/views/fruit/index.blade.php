<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fruits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
            class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Fruit
                                </p>
                            </th>

                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Category
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
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <form action="{{ route('fruit.store') }}" method="POST">
                                @csrf
                                <td class="p-4 border-b border-blue-gray-50">
                                    <input type="text" name="name" required />
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <select name="category_id" required>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <select name="unit_id" required>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->unit }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <input type="number" step='0.01' value='0.00' placeholder='0.00' min="0" name="price" required />
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <button type="submit">Create</button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
            class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Fruit
                                </p>
                            </th>

                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Category
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
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($fruits as $fruit)
                        <tr>
                            <form action="{{ route('fruit.update', ['fruit' => $fruit->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="put" />

                                <td class="p-4 border-b border-blue-gray-50">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        <input type="text" name="name" value="{{ $fruit->name }}" required />
                                    </p>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <select name="category_id" required>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $fruit->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <select name="unit_id" required>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{ $fruit->unit->id == $unit->id ? 'selected' : '' }}>{{ $unit->unit }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    <input type="number" step='0.01' value="{{ $fruit->price }}" placeholder='0.00' min="0" name="price" required />
                                    </p>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <button type="submit">Update</button>
                                </td>
                            </form>

                            <form action="{{ route('fruit.destroy', ['fruit' => $fruit->id]) }}" method="POST">
                                <td class="p-4 border-b border-blue-gray-50">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete" />
                                    <button type="submit">Delete</button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>
