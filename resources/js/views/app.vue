<template>
   <div id="container">
        <div class="row">
            <div class="col">
              Available spells
              <ul id="spells" class="list-group">
                <li v-for="spell in spellList" class="list-group-item">
                  <span v-on:click="spell.show === 1 ? hideSpell(spell) : showSpell(spell)">
                    <strong>{{ spell.Name }}</strong> | {{ spell.Level }} | {{ spell["Casting Time"] }}</span> <input type="checkbox" :checked="spell.prepared" v-on:change="spell.prepared === 1 ? unprepareSpell(spell) : prepareSpell(spell)">
                  <div class="card card-body" v-show="spell.show === 1">
                    {{ spell.Duration }} | {{ spell.Range }} 
                    <br> 
                    {{ spell.Components }} | {{spell.School }} 
                    <br>
                    {{ spell.Text }}
                    <br>
                    <strong>At Higher Levels:</strong><br>{{ spell["At Higher Levels"] }}
                  </div>
                </li>
              </ul>
            </div>
            <div class="col">
              Prepared spells
              <ul id="spells" class="list-group">
                <li v-for="spell in spellList" v-if="spell.prepared" class="list-group-item">
                  <span>
                    <strong>{{ spell.Name }}</strong> | {{ spell.Level }} | {{ spell["Casting Time"] }}</span> <input type="checkbox" :checked="spell.prepared" v-on:change="spell.prepared === 1 ? unprepareSpell(spell) : prepareSpell(spell)">
                  <div class="card card-body">
                    {{ spell.Duration }} | {{ spell.Range }} 
                    <br> 
                    {{ spell.Components }} | {{spell.School }} 
                    <br>
                    {{ spell.Text }}
                    <br>
                    <strong>At Higher Levels:</strong><br>{{ spell["At Higher Levels"] }}
                  </div>
                </li>
              </ul>
            </div>
            <div class="col">
              Spellcasting
            </div>
        </div>
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
    },
    prepareSpell(spell){
      spell.prepared = 1;
      this.$set(this.spellList, spell.Name, spell); 
      this.$forceUpdate(); //TODO see previous todo; might want to handle prepared spells differently altogether by pushing and popping them from their own array
    }, 
    unprepareSpell(spell){
      spell.prepared = 0;
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