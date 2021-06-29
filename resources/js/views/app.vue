<template>
  <div>
    <ul id="spells">
      <li v-for="spell in spellList">
        <span v-on:click="spell.show === 1 ? hideSpell(spell) : showSpell(spell)">{{ spell.Name }}</span>
        <span v-show="spell.show === 1">{{ spell.Text }}</span>
      </li>
    </ul>
  </div>
</template>
<script>


export default {
  methods: {
    showSpell(spell) {
      spell.show = 1;
      this.$set(this.spellList, spell.Name, spell); 
      this.$forceUpdate(); //TODO find a better way to deal with the reactivity problem (probably need to update data structure & use :key)
    },
    hideSpell(spell){
      spell.show = 0;
      this.$set(this.spellList, spell.Name, spell); 
      this.$forceUpdate(); //TODO see previous todo
    } 
  },
  props: ['spells'],
  data() {
      return {
          spellList: JSON.parse(this.spells)
      } 
  }
};
</script>