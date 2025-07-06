<!-- name of each tab group should be unique -->
<div class="tabs tabs-lift my-8">
  <input type="radio" name="Activos" class="tab" aria-label="Activos" />

  <input type="radio" name="Inactivos" class="tab" aria-label="Inactivos" checked="checked" />

  <input type="radio" name="my_tabs_3" class="tab" aria-label="Tab 3" />

</div>
<div class="overflow-x-auto">
    <table class="table table-zebra">
        {{ $slot }}
        </tbody>
    </table>
</div>
