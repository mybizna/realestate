<template>
  <edit-render
    :path_param="path_param"
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
      path_param: ["realestate", "building_unit_setup"],
      form_groups: [
        {
          name: "setting",
          legend: "Setting",
          styleClasses: "flex col-lg-6 col-sm-12 setting-group"
        },
        {
          name: "description",
          legend: "Description",
          styleClasses: "flex col-lg-6 col-sm-12 description-group"
        }
      ],
      model: {
        id: "",
        description: "",
        user_id: "",
        payment_id: "",
        amount: "",
        completed: "",
        successful: ""
      },

      form_fields: [
        {
          type: "editor",
          name: "description",
          group: "description",
          prefix: '"',
          suffix: '"'
        },
        {
          type: "text",
          name: "user_id",
          group: "main",
          prefix: '"',
          suffix: '"'
        },
        {
          type: "text",
          name: "payment_id",
          group: "main",
          prefix: '"',
          suffix: '"',
          readonly: true,
          disabled: true
        },
        {
          type: "text",
          name: "amount",
          group: "main",
          prefix: '"',
          suffix: '"'
        },
        {
          type: "yesno",
          name: "completed",
          group: "setting",
          prefix: '"',
          suffix: '"'
        },
        {
          type: "yesno",
          name: "successful",
          group: "setting",
          prefix: '"',
          suffix: '"'
        }
      ],
    };
  }
};
</script>
