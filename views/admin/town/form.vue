<template>
  <edit-render
    :path_param="['realestate', 'town']"
    :form_fields="form_fields"
    :form_groups="form_groups"
    :model="model"
  ></edit-render>
</template>

<script>

export default {
 
  data() {
    return {
      id: null,
      model: {
        id: "",
        description: "",
        user_id: "",
        payment_id: "",
        amount: "",
        completed: "",
        successful: ""
      },

    };
  }
};
</script>
