<nav class="bg-gray-800 py-4">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            <a href="{{ route('quotes-ui.v1.quotes.index') }}" class="text-white font-bold text-xl">Camilo | Quotes App</a>
            <div class="flex space-x-4">
                <a href="{{ route('quotes-ui.v1.quotes.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Quote List</a>
                <a href="{{ route('quotes-ui.v1.quotes.random') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Random Quote</a>
                <a href="{{ route('quotes-ui.v1.quotes.search') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Search Quote</a>
            </div>
        </div>
    </div>
</nav>