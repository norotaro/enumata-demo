<script setup>
import { router } from '@inertiajs/vue3';
import { ref } from "vue";
import StateMachine from "@/components/StateMachine.vue";

const props = defineProps(['order']);

const transition = ref('');

function updateStatus() {
  router.post('/status/update/' + props.order.id, { 'transition': transition.value });
}

function isTransitionsAvailable() {
  return Object.keys(props.order.transitions).length ? true : false;
}
</script>

<template>
  <main class="pt-8 pb-16">
    <div class="mx-auto w-full max-w-7xl">
      <div class="p6 shadow bg-white rounded">
        <div class="p-4 border-b border-gray-200">
          <h2 class="text-xl font-bold text-gray-800">Order Information</h2>
        </div>

        <div class="sm:p-0">
          <dl>
            <div class="py-5 grid grid-cols-3 gap-4 px-6">
              <dt class="text-sm font-medium text-gray-500">
                #Number
              </dt>
              <dd class="text-sm text-gray-900 col-span-2">
                {{ order.id }}
              </dd>
            </div>
            <div class="py-5 grid grid-cols-3 gap-4 px-6">
              <dt class="text-sm font-medium text-gray-500">
                Current Status
              </dt>
              <dd class="text-sm text-gray-900 col-span-2">
                <span
                  class="bg-cyan-100 text-cyan-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-cyan-400">
                  {{ order.status }}
                </span>
              </dd>
            </div>
          </dl>
        </div>
      </div>

      <h2 class="mt-8 text-lg font-bold text-gray-800">State Machine</h2>
      <div class="mt-2 shadow bg-white rounded">
        <StateMachine :currentState="order.status"></StateMachine>
      </div>

      <h2 class="mt-8 text-lg font-bold text-gray-800">Transitions</h2>
      <div class="mt-2 shadow bg-white rounded">
        <div class="p-5">
          <form @submit.prevent="updateStatus()">
            <div v-if="isTransitionsAvailable()" class="grid grid-cols-1 gap-y-6 gap-x-4">
              <div>
                <label class="block text-sm font-medium text-gray-700">
                  Apply transition
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <select v-model="transition" class="border w-full rounded py-2 px-2">
                    <option value="">Choose the transition to apply</option>
                    <option v-for="(status, transition) in order.transitions" :value="transition">
                      {{ transition }}: change to {{ status }}
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <div v-else class="grid grid-cols-1 gap-y-6 gap-x-4">
              The order has a final status and can no longer be transitioned.
            </div>

            <div class="pt-5">
              <div class="flex justify-end">
                <button @click="router.post('/status/reset')" type="reset"
                  class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700">
                  Reset
                </button>
                <button type="submit" v-if="isTransitionsAvailable()"
                  class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600">
                  Save
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</template>
