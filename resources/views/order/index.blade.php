<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Make an order
                </div>
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
                                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Quantity
                                    </p>
                                </th>

                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($fruits as $fruit)
                            <tr>
                                <form action="{{ route('order.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="fruit_id" value="{{$fruit->id}}" />

                                    <td class="p-4 border-b border-blue-gray-50">
                                        {{$fruit->name}}
                                        <input type="hidden" name="name" value="{{$fruit->name}}" />
                                    </td>

                                    <td class="p-4 border-b border-blue-gray-50">
                                        {{$fruit->category->name}}
                                        <input type="hidden" name="category" value="{{$fruit->category->name}}" />
                                    </td>

                                    <td class="p-4 border-b border-blue-gray-50">
                                        {{$fruit->unit->unit}}
                                        <input type="hidden" name="unit" value="{{$fruit->unit->unit}}" />
                                    </td>

                                    <td class="p-4 border-b border-blue-gray-50">
                                        {{$fruit->price}}
                                        <input type="hidden" name="price" value="{{$fruit->price}}" />
                                    </td>

                                    <td class="p-4 border-b border-blue-gray-50">
                                        <input type=number name="quantity" min="1" required>
                                    </td>

                                    <td class="p-4 border-b border-blue-gray-50">
                                        <button type="submit">Add to basket</button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('order.save') }}" method="POST">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Buyer's Name: <input type="text" name="buyer" required />
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Your orders
                    </div>
                </div>
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
                                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Quantity
                                    </p>
                                </th>

                                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Total Price
                                    </p>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($basket as $id => $item)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    {{$item['name']}}
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    {{$item['category']}}
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
                                    {{$item['price'] * $item['quantity']}}
                                </td>
                                <input type="hidden" name="items[{{$id}}][quantity]" value="{{$item['quantity']}}" />
                                <input type="hidden" name="items[{{$id}}][price]" value="{{$item['price']}}" />
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <button type="submit">Place Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Past Orders
                </div>
            </div>

            <div
            class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Buyer
                                </p>
                            </th>

                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Basket
                                </p>
                            </th>

                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Print
                                </p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{$order->buyer}}
                                </p>
                            </td>

                            <td class="p-4 border-b border-blue-gray-50">
                                <table class="w-full text-left table-auto min-w-max">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Fruit</th>
                                            <th>Unit</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->basket as $items)
                                        <tr>
                                            <td>
                                                {{$items->fruit->category->name}}
                                            </td>
                                            <td>
                                                {{$items->fruit->name}}
                                            </td>

                                            <td>
                                                {{$items->fruit->unit->unit}}
                                            </td>
                                            <td>
                                                {{$items->fruit->price}}
                                            </td>

                                            <td>
                                                {{$items->quantity}}
                                            </td>
                                            <td>
                                                {{$items->fruit->price*$items->quantity}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>

                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    <form action="{{ route('order.print') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$order->id}}" />
                                        <button type="submit">Print</button>
                                    </form>
                                </p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>
