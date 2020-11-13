<template>
    <div class="bg-white">
        {{ restaurant }}
    </div>
</template>

<script>
  export default {
    name: "Restaurants",
    props: ['restaurant', 'product_categories'],
    data() {
        return {

        }
    },
    mounted() {
      console.log("Example component mounted");
    },
    methods: {

    }
  };
</script>
