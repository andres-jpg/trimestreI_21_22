<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terremotos en La Palma') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-sm sm:rounded-lg" style="max-height: 600px; overflow: overlay;">
                <div class="p-6 bg-white-transparent border-b border-gray-200">
                <div class="row">
                    <table>
                        <thead>
                            <tr>
                                <th>DateTime</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Profundidad</th>
                                <th>Magnitud</th>
                                <th>Localidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $terremotos as $terremoto )
                            <tr>
                                <td>
                                    {{ $terremoto->DateTime }}</a>
                                </td>
                                <td>
                                    {{ $terremoto->Latitude }}</a>
                                </td>
                                <td>
                                    {{ $terremoto->Longitude }}
                                </td>
                                <td>
                                    {{ $terremoto->Depth }}</a>
                                </td>
                                <td>
                                    {{ $terremoto->Magnitud }}</a>
                                </td>
                                <td>
                                    {{ $terremoto->localidad_id }}</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
