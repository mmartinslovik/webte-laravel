<x-app-layout>
    <x-slot name="header">
        @if(isset($location))
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Result') }} : {{ $location->name }}
            </h2>
        @endif
    </x-slot>

    <div class="flex p-12 flex-col justify-items-center">
        {{--    Weather and location details    --}}
        <div class="w-full flex items-center py-4">
            @if(isset($location) and isset($country))
                <div class="flex w-full items-center">

                    <ul class="flex w-full flex-col bg-gray-300 p-4 mr-2 rounded-md">
                        <li class="border-gray-400 flex flex-row mb-2">
                            <div
                                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                <div
                                    class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                                    🔎
                                </div>
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">Searched</div>
                                    <div class="text-gray-600 text-sm">{{ $location->name }}</div>
                                </div>
                            </div>
                        </li>
                        <li class="border-gray-400 flex flex-row mb-2">
                            <div
                                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                <div
                                    class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                                    📍
                                </div>
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">Latitude</div>
                                    <div class="text-gray-600 text-sm">{{ $location->latitude }}</div>
                                </div>
                            </div>
                        </li>
                        <li class="border-gray-400 flex flex-row mb-2">
                            <div
                                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                <div
                                    class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                                    📍
                                </div>
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">Longitude</div>
                                    <div class="text-gray-600 text-sm">{{ $location->longitude }}</div>
                                </div>
                            </div>
                        </li>
                        <li class="border-gray-400 flex flex-row mb-2">
                            <div
                                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                <div
                                    class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                                    🌍
                                </div>
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">Country</div>
                                    <div class="text-gray-600 text-sm">{{ $country->name }}</div>
                                </div>
                            </div>
                        </li>
                        <li class="border-gray-400 flex flex-row mb-2">
                            <div
                                class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                <div
                                    class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                                    🌆
                                </div>
                                <div class="flex-1 pl-1 mr-16">
                                    <div class="font-medium">Capital</div>
                                    <div class="text-gray-600 text-sm">{{ $country->capital }}</div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            @endif

            @if(isset($weather))
                <div class="flex justify-center w-full flex-1 ml-2">
                    <div
                        class="border border-gray-100 bg-gray-50 transition-shadow shadow-lg hover:shadow-shadow-xl w-full bg-green-600 text-purple-50 rounded-md">
                        <h2 class="text-md mb-2 px-4 pt-4">
                            <div class="flex justify-between">
                                <div class="badge relative top-0">
                                    <span
                                        class="mt-2 py-1 h-12px text-md font-semibold w-12px  rounded right-1 bottom-1 px-4">{{ $weather->condition->text }} today</span>
                                </div>
                                <span class="text-lg font-bold ">{{ date('d.m.Y') }}</span>
                            </div>
                        </h2>

                        <div class="flex items-center p-4">
                            <div class="flex justify-center items-center w-96">
                                <img src="{{ $weather->condition->icon  }}" alt="weather-icon">
                            </div>
                        </div>
                        <div class="text-md pt-4 pb-4 px-4">
                            <div class="flex justify-between items-center">
                                <div class="space-y-2">
                                    <span class="flex space-x-2 items-center"><svg height="20" width="20"
                                                                                   viewBox="0 0 32 32"
                                                                                   class="fill-current"><path
                                                d="M13,30a5.0057,5.0057,0,0,1-5-5h2a3,3,0,1,0,3-3H4V20h9a5,5,0,0,1,0,10Z"></path><path
                                                d="M25 25a5.0057 5.0057 0 01-5-5h2a3 3 0 103-3H2V15H25a5 5 0 010 10zM21 12H6V10H21a3 3 0 10-3-3H16a5 5 0 115 5z"></path></svg> <span>{{ $weather->avgvis_km }}km/h</span></span><span
                                        class="flex space-x-2 items-center"><svg height="20" width="20"
                                                                                 viewBox="0 0 32 32"
                                                                                 class="fill-current"><path
                                                d="M16,24V22a3.2965,3.2965,0,0,0,3-3h2A5.2668,5.2668,0,0,1,16,24Z"></path><path
                                                d="M16,28a9.0114,9.0114,0,0,1-9-9,9.9843,9.9843,0,0,1,1.4941-4.9554L15.1528,3.4367a1.04,1.04,0,0,1,1.6944,0l6.6289,10.5564A10.0633,10.0633,0,0,1,25,19,9.0114,9.0114,0,0,1,16,28ZM16,5.8483l-5.7817,9.2079A7.9771,7.9771,0,0,0,9,19a7,7,0,0,0,14,0,8.0615,8.0615,0,0,0-1.248-3.9953Z"></path></svg> <span>{{ $weather->avghumidity }}%</span></span>
                                </div>
                                <div>
                                    <h1 class="text-6xl"> {{ $weather->avgtemp_c }}°C</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <div id="map" class="h-96 rounded-md"></div>
        <div class="flex flex-col justify-center h-full mt-4">
            <!-- Table -->
            <div class="w-full w-full bg-white shadow-lg border border-gray-200 rounded-md">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Countries</h2>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Country</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">#</div>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                            @foreach(\App\Models\Country::all() as $country)
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img
                                                    src="https://countryflagsapi.com/png/{{ $country->iso_code }}"
                                                    alt="flag" width="40" height="40"></div>
                                            <button id="{{ $country->iso_code }}"
                                                    class="font-medium text-gray-800 btn">{{ $country->name }}</button>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div
                                            class="text-left font-medium text-green-500">{{ \App\Models\Location::where('country_iso_code',$country->iso_code)->count() }}</div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-center h-full mt-4">
            <!-- Table -->
            <div class="w-full w-full bg-white shadow-lg border border-gray-200 rounded-md">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Logins</h2>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">6:00-15:00</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">15:00-21:00</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">21:00-24:00</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">24:00-6:00</div>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div
                                            id="div1"
                                            class="text-left font-medium text-green-500"></div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div
                                            id="div2"
                                            class="text-left font-medium text-green-500"></div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div
                                            id="div3"
                                            class="text-left font-medium text-green-500"></div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div
                                            id="div4"
                                            class="text-left font-medium text-green-500"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($_COOKIE['ISO']))
            <div class="flex flex-col justify-center h-full mt-4">
                <!-- Table -->
                <div class="w-full w-full bg-white shadow-lg border border-gray-200 rounded-md">
                    <header class="px-5 py-4 border-b border-gray-100">
                        <h2 class="font-semibold text-gray-800">Cities</h2>
                    </header>
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">{{ $_COOKIE['ISO'] }}</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">#</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                @foreach(\App\Models\Location::distinct()->select('name')->where('country_iso_code', $_COOKIE['ISO'])->groupBy('name')->get() as $l)
                                    <tr>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="font-medium text-gray-800 btn">{{ $l->name }}</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div
                                                class="text-left font-medium text-green-500">{{ \App\Models\Location::where('name',$l->name)->count() }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <script>
        let map = L.map('map').setView([51.505, -0.09], 2)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map)
        @foreach(\App\Models\Location::all() as $location)
        L.marker([{{ $location->latitude }}, {{ $location->longitude }}]).addTo(map)
        @endforeach

        let buttons = document.querySelectorAll(".btn")
        buttons.forEach(b => {
            b.addEventListener('click', function () {
                document.cookie = "ISO = " + b.id
                console.log(document.cookie)
                window.location.reload(true)
            })
        })

        let timestamps = []
        let hours = []
        @foreach(\App\Models\Location::all() as $location)
        timestamps.push("{{ $location->local_time }}")
        @endforeach

        timestamps.forEach(t => {
            hours.push(Number(t[11] + t[12]))
        })

        let first = []
        let second = []
        let third = []
        let fourth = []

        hours.forEach(h => {
            if (h > 6 && h < 15) {
                first.push(h)
            } else if (h > 15 && h < 21) {
                second.push(h)
            } else if (h > 21 && h < 24) {
                third.push(h)
            } else if (h > 24 && h < 6) {
                fourth.push(h)
            }
        })

        let logins = {
            1: first.length,
            2: second.length,
            3: third.length,
            4: fourth.length,
        }

        document.querySelector('#div1').append(String(first.length))
        document.querySelector('#div2').append(String(second.length))
        document.querySelector('#div3').append(String(third.length))
        document.querySelector('#div4').append(String(fourth.length))
    </script>
</x-app-layout>
