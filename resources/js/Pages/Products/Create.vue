<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const form = useForm({
  name: "",
  body: "",
  user_name: "",
  address: "",
});

const formStep = ref(1);

const submit = () => {
  form.post(route("products.store"), {
    onSuccess: () => {
      form.reset(), (formStep.value = 1);
    },
  });
};

function nextStep() {
  Inertia.post(
    route("products.first.step"),
    {
      name: form.name,
      body: form.body,
    },
    {
      onSuccess: () => {
        formStep.value++;
      },
    }
  );
}
function prevStep() {
  formStep.value--;
}
</script>

<template>
  <BreezeGuestLayout>
    <Head title="Create Product" />

    <BreezeValidationErrors class="mb-4" />

    <form>
      <div v-if="formStep == 1">
        <div>
          <BreezeLabel for="name" value="Name" />
          <BreezeInput
            id="name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.name"
          />
        </div>

        <div class="mt-4">
          <BreezeLabel for="body" value="Body" />
          <BreezeInput
            id="body"
            type="text"
            class="mt-1 block w-full"
            v-model="form.body"
          />
        </div>
      </div>

      <div v-if="formStep == 2">
        <div class="mt-4">
          <BreezeLabel for="user_name" value="User Name" />
          <BreezeInput
            id="user_name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.user_name"
          />
        </div>

        <div class="mt-4">
          <BreezeLabel for="address" value="Address" />
          <BreezeInput
            id="address"
            type="text"
            class="mt-1 block w-full"
            v-model="form.address"
          />
        </div>
      </div>

      <div class="flex items-center justify-end mt-4">
        <BreezeButton
          class="ml-4"
          v-if="formStep == 1"
          type="button"
          @click="nextStep"
        >
          Next
        </BreezeButton>
        <BreezeButton
          class="ml-4"
          v-if="formStep == 2"
          type="button"
          @click="prevStep"
        >
          Prev
        </BreezeButton>
        <BreezeButton
          class="ml-4"
          v-if="formStep == 2"
          type="button"
          @click="submit"
        >
          Create
        </BreezeButton>
      </div>
    </form>
  </BreezeGuestLayout>
</template>
