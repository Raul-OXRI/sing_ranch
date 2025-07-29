<x-app-layout>

    <div class="flex items-center justify-center sm:py-4">
    <div class="stats stats-vertical sm:stats sm:shadow">
        <div class="stat">
            <div class="stat-figure text-secondary">
                <i class="fa-solid fa-skull-cow text-xl sm:text-4xl"></i>
            </div>
            <div class="stat-title text-sm sm:text-xl">Animales</div>
            <div class="stat-value text-lg sm:text-3xl">{{ $totalregistro }}</div>
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


<div class="py-8">
    <progress class="progress progress-primary w-56" value="40" max="100"></progress>
</div>






</x-app-layout>
