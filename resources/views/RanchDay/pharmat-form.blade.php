 <div class="grid grid-cols-1 gap-4">
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <label for="cow_id" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">No. animal</span>
         </label>
         <input type="text" class="input input-bordered w-full max-w-xs" value="{{ $cow->animal_code }}" disabled>
         <input type="hidden" name="cow_id" value="{{ $cow->id }}">
     </div>
     {{-- Peso --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="weight" class="checkbox checkbox-primary" id="weight" value="0">
         <input type="checkbox" name="weight" value="1" id="weight" class="checkbox checkbox-primary">
         <label for="weight" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Peso</span>
         </label>
         <input type="date" name="weight_date" class="input input-bordered w-full max-w-xs">
         <input type="text" name="int_weight" class="input input-bordered w-full max-w-xs" placeholder="Peso en lb">
     </div>
     {{-- Vacuna --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="vaccine" class="checkbox checkbox-primary" id="vaccine" value="0">
         <input type="checkbox" name="vaccine" value="1" id="vaccine" class="checkbox checkbox-primary">
         <label for="vaccine" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Vacuna</span>
         </label>
         <input type="date" name="vaccine_date" class="input input-bordered w-full max-w-xs">
     </div>
     {{-- Desparasitación --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="deworming" class="checkbox checkbox-primary" id="deworming" value="0">
         <input type="checkbox" name="deworming" value="1" id="deworming" class="checkbox checkbox-primary">
         <label for="deworming" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Desparasitación</span>
         </label>
         <input type="date" name="deworming_date" class="input input-bordered w-full max-w-xs">
     </div>
     {{-- Chequeo Médico --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="health_check" class="checkbox checkbox-primary" id="health_check" value="0">
         <input type="checkbox" name="health_check" value="1" id="health_check" class="checkbox checkbox-primary">
         <label for="health_check" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Chequeo Médico</span>
         </label>
         <input type="date" name="health_check_date" class="input input-bordered w-full max-w-xs">
     </div>
     {{-- Palpación --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="feel" class="checkbox checkbox-primary" id="feel" value="0">
         <input type="checkbox" name="feel" value="1" id="feel" class="checkbox checkbox-primary">
         <label for="feel" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Palpación</span>
         </label>
         <input type="date" name="feel_date" class="input input-bordered w-full max-w-xs">
     </div>
     {{-- Antirrábica --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="antirabies" class="checkbox checkbox-primary" id="antirabies" value="0">
         <input type="checkbox" name="antirabies" value="1" id="antirabies" class="checkbox checkbox-primary">
         <label for="antirabies" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Antirrábica</span>
         </label>
         <input type="date" name="antirabies_date" class="input input-bordered w-full max-w-xs">
     </div>
     {{-- Esteroides --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="steroids" class="checkbox checkbox-primary" id="steroids" value="0">
         <input type="checkbox" name="steroids" value="1" id="steroids" class="checkbox checkbox-primary">
         <label for="steroids" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Esteroides</span>
         </label>
         <input type="date" name="steroids_date" class="input input-bordered w-full max-w-xs">
     </div>
     {{-- Antibióticos --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="antibiotics" class="checkbox checkbox-primary" id="antibiotics"
             value="0">
         <input type="checkbox" name="antibiotics" value="1" id="antibiotics"
             class="checkbox checkbox-primary">
         <label for="antibiotics" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Antibióticos</span>
         </label>
         <input type="date" name="antibiotics_date" class="input input-bordered w-full max-w-xs">
     </div>
     {{-- Vitaminas --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="vitamins" class="checkbox checkbox-primary" id="vitamins" value="0">
         <input type="checkbox" name="vitamins" value="1" id="vitamins" class="checkbox checkbox-primary">
         <label for="vitamins" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Vitaminas</span>
         </label>
         <input type="date" name="vitamins_date" class="input input-bordered w-full max-w-xs">
     </div>
     {{-- Suero --}}
     <div class="flex items-center gap-4 bg-base-100 p-4 rounded-xl shadow">
         <input type="hidden" name="serum" class="checkbox checkbox-primary" id="serum" value="0">
         <input type="checkbox" name="serum" value="1" id="serum" class="checkbox checkbox-primary">
         <label for="serum" class="label cursor-pointer flex-1">
             <span class="label-text font-semibold">Suero</span>
         </label>
         <input type="date" name="serum_date" class="input input-bordered w-full max-w-xs">
     </div>
 </div>
 {{-- Notas --}}
 <div class="mt-4">
     <label for="notes" class="label">
         <span class="label-text font-semibold">Notas</span>
     </label>
     <textarea name="notes" id="notes" class="textarea textarea-bordered w-full" rows="4"
         placeholder="Observaciones adicionales..."></textarea>
 </div>
