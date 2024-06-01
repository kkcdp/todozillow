<template>
    <div class="filter-card">
        <form @submit.prevent="filter">
            <div class=" flex flex-wrap gap-3 justify-center">
                <div class="flex flex-nowrap flex-col items-end">
                    <div class="flex flex-row items-center">
                        <label class="mr-2" for="dfrom">Date from</label>
                        <input
                        id="dfrom"
                        v-model.date="filterForm.dateFrom"
                        type="date"
                        />
                    </div>

                    <div class="flex flex-row pt-2 items-center">
                        <label class="mr-2" for="dto">Date to</label>
                        <input
                        id="dto"
                        v-model.date="filterForm.dateTo"
                        type="date"
                        />
                    </div>

                </div>
                <div class="flex flex-col flex-nowrap items-center">
                    <select v-model="filterForm.isFinished">
                        <option :value="null">Done or not</option>
                        <option :value="1">Finished</option>
                        <option :value="false">Unfinished</option>
                    </select>
                    <select v-model="filterForm.isImportant" class="mt-2">
                        <option :value="null">Importance</option>
                        <option :value="1">Important</option>
                        <option :value="false">Regular</option>
                    </select>
                </div>

                <div class="flex flex-row items-start gap-2">
                    <div class="flex flex-nowrap items-center">
                        <input
                        v-model="filterForm.search"
                        type="text"
                        placeholder="search ..."
                        />
                    </div>

                    <div class="">
                        <button
                        type="submit"
                        class="btn-primary">
                        Filter
                        </button>

                        <button
                        type="reset"
                        @click="clear"
                        class="btn-primary">
                        Clear
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    filters: Object
})

const filterForm = useForm({
    dateFrom: props.filters.dateFrom ?? null,
    dateTo: props.filters.dateTo ?? null,
    search: props.filters.search ?? '',
    isFinished: props.filters.isFinished ?? null,
    isImportant: props.filters.isImportant ?? null,
})



const filter = () => {
  filterForm.get(
    route('showalltodos'),
    {
      preserveState: true,
      preserveScroll: true,
    },
  )
}
const clear = () => {
  filterForm.dateFrom = null
  filterForm.dateTo = null
  filterForm.thisMonth = null
  filterForm.thisWeek = null
  filterForm.search = null
  filterForm.isFinished = null
  filterForm.isImportant = null


  filter()
}

</script>
