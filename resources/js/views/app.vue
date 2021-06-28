<template>
  <div>
  <h1>from inside are coming the</h1>
    {{spells}}
  </div>
</template>
<script>
const default_layout = "default";


export default {
  computed: {},
  props: ['spells'],
  data() {
      return {
          message:'Hello World2'
      } 
  }
};
</script>