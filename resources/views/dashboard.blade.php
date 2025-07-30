<x-app-layout>
    <div x-data='{ username: @json($user->name), lastName: @json($user->last_name) }'>
        Bienvenido: <strong x-text="username + ' ' + lastName"></strong>
    </div>
    <div class="flex items-center justify-center sm:pt-15">
        <div class="stats stats-vertical sm:stats sm:shadow">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <i class="fa-solid fa-skull-cow text-xl sm:text-4xl"></i>
                </div>
                <div class="stat-title text-sm sm:text-xl">Animales</div>
                @if ($user->rol === 'admin')
                <div class="stat-value text-lg sm:text-3xl">{{ $totalregistro }}</div>
                @elseif ($user->rol === 'propietario')
                <div class="stat-value text-lg sm:text-3xl">{{ $totalregistro }}</div>
                @endif
                
                <div class="stat-desc text-sm sm:text-sm">2010 - hasta la fecha</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <i class="fa-solid fa-user-cowboy text-xl sm:text-4xl"></i>
                </div>
                <div class="stat-title text-sm sm:text-xl">Propietarios</div>
                <div class="stat-value text-lg sm:text-3xl">{{ $totalPropietarios }}</div>
                <div class="stat-desc text-sm sm:text-sm">Registrados en el sistema</div>
            </div>
        </div>
    </div>


    <div class="flex items-center justify-center sm:pt-15">
        <div class="stats stats-vertical sm:stats sm:shadow">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <i class="fa-solid fa-badge-check text-xl sm:text-4xl"></i>
                </div>
                <div class="stat-title text-sm sm:text-xl">Activos</div>
                <div class="stat-value text-lg sm:text-3xl">{{ $cow_total }}</div>
                <div class="stat-desc text-sm sm:text-sm">Animales Activos</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <i class="fa-solid fa-money-bill-1-wave text-xl sm:text-4xl"></i>
                </div>
                <div class="stat-title text-sm sm:text-xl">Vendidos</div>
                <div class="stat-value text-lg sm:text-3xl">{{ $cow_death }}</div>
                <div class="stat-desc text-sm sm:text-sm">Animales Vendidos</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <i class="fa-solid fa-cross text-xl sm:text-4xl"></i>
                    
                </div>
                <div class="stat-title text-sm sm:text-xl">Muertos</div>
                <div class="stat-value text-lg sm:text-3xl">{{ $cow_sold }}</div>
                <div class="stat-desc text-sm sm:text-sm">Animales Muertos</div>
            </div>
        </div>
    </div>


    <div class="py-15">
        @if ($user->rol === 'admin')
            <h2 class="text-xl font-semibold mb-4">Distribución de Vacas por Propietario</h2>
            <div class="flex space-x-8 overflow-x-auto py-4">
                @foreach ($propietariosConVacas as $propietario)
                    <div class="flex flex-col items-center min-w-[80px]" x-data="{
                        total: {{ $propietario->vacas_activas + $propietario->toros_activos }},
                        vacas: {{ $propietario->vacas_activas }},
                        toros: {{ $propietario->toros_activos }}
                    }">
                        <div class="flex flex-row items-end h-60 space-x-2">
                            <!-- Barra de vacas -->
                            <div class="bg-secondary w-5 rounded-t"
                                :style="{ height: total > 0 ? ((vacas / total) * 100 + '%') : '0%' }"
                                title="Vacas: {{ $propietario->vacas_activas }}"></div>
                            <div class="bg-neutral w-5 rounded-b"
                                :style="{ height: total > 0 ? ((toros / total) * 100 + '%') : '0%' }"
                                title="Toros: {{ $propietario->toros_activos }}"></div>
                        </div>
                        <div class="mt-2 text-center">
                            <p class="font-medium truncate max-w-[80px]" title="{{ $propietario->name }}">
                                {{ Str::limit($propietario->name, 10) }}
                            </p>
                            <p class="text-sm text-gray-600">
                                Total: {{ $propietario->vacas_activas + $propietario->toros_activos }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center mt-4 space-x-4">
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-secondary mr-2"></div>
                    <span>Vacas</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-neutral mr-2"></div>
                    <span>Toros</span>
                </div>
            </div>
        @elseif ($user->rol === 'propietario')
            <div class="flex flex-col items-center" x-data="{
                total: {{ $vacas + $toros }},
                vacas: {{ $vacas }},
                toros: {{ $toros }}
            }">
                <div class="flex flex-row items-end h-60 space-x-4">
                    <!-- Barra de vacas -->
                    <div class="bg-secondary w-5 rounded-t"
                        :style="{ height: total > 0 ? ((vacas / total) * 100 + '%') : '0%' }"
                        title="Vacas: {{ $vacas }}"></div>
                    <div class="bg-neutral w-5 rounded-b"
                        :style="{ height: total > 0 ? ((toros / total) * 100 + '%') : '0%' }"
                        title="Toros: {{ $toros }}"></div>
                </div>
                <div class="mt-4 text-center">
                    <p class="font-medium">{{ $user->name }}</p>
                    <div class="flex space-x-4 mt-2">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-secondary mr-2"></div>
                            <span x-text="'Vacas: ' + vacas"></span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-neutral mr-2"></div>
                            <span x-text="'Toros: ' + toros"></span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mt-2" x-text="'Total: ' + total"></p>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
