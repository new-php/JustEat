<template>
    <div class="bg-white">
        {{ restaurant }}
    </div>
</template>

<script>
  export default {
    name: "Restaurants",
    props: ['restaurant'],
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

<style type="text/css">
    
</style>
