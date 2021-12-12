<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Municipios de La Palma') }}
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
                                <th>Nombre</th>
                                <th>Poblaci&oacute;n</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $municipios as $municipio )
                            <tr>
                                <td>
                                <a href="{{route('localidades', array('municipio_id' => $municipio->id))}}">
                                    {{ $municipio->nombre }}</a>
                                </td>
                                <td>
                                    {{ $municipio->poblacion }}
                                </td>
                                <td>
                                    <a href="{{route('getMunicipio', array('municipio_id' => $municipio->id))}}" >
                                        <img src="/assets/css/images/edit.png" width="32px" />
                                    </a>
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
