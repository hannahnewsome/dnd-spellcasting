<template>
   <div id="container">
        <div class="row">
            <div class="col">
              Available spells
              <ul id="spells" class="list-group">
                <li v-for="spell in spellList" v-bind:key="spell.Name" class="list-group-item">
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
              Prepared spells<br>
              {{ getAvailableToPrepareNumber() }} available spells to prepare<br>
              <ul id="spells" class="list-group">
                <li v-for="(spell, index) in preparedSpells" v-bind:key="spell.Name" class="list-group-item">
                  <span>
                    <strong>{{ spell.Name }}</strong> | {{ spell.Level }} | {{ spell["Casting Time"] }}</span> <input type="checkbox" :checked="spell.prepared" v-on:change="unprepareSpell(spell)">
                  <div class="card card-body">
                    {{ spell.Duration }} | {{ spell.Range }} 
                    <br> 
                    {{ spell.Components }} | {{spell.School }} 
                    <br>
                    {{ spell.Text }}
                    <br>
                    <strong>At Higher Levels:</strong><br>{{ spell["At Higher Levels"] }}<br>
                    <button type="button" class="btn btn-primary" v-on:click="castSpell(spell)">Cast Spell</button>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col">
              Spellcasting<br>
              <p>Spell slots
              1st: <input type="checkbox"> | <input type="checkbox"> | <input type="checkbox"> | <input type="checkbox"><br>
              2nd: <input type="checkbox"> | <input type="checkbox"> | <input type="checkbox"><br>
              3rd: <input type="checkbox"> | <input type="checkbox"> | <input type="checkbox"></p>
              <ul id="spells" class="list-group">
                <li v-for="spell in spellList" v-bind:key="spell.Name" v-if="spell.cast" class="list-group-item">
                  <span>
                    <strong>{{ spell.Name }}</strong> | {{ spell.Level }} | {{ spell["Casting Time"] }} | Cast {{ spell.cast }} times</span>
                </li>
              </ul>
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
      this.preparedSpells.push(spell);
      this.$forceUpdate(); //TODO see previous todo; might want to handle prepared spells differently altogether by pushing and popping them from their own array
    }, 
    unprepareSpell(spell){
      _.remove(this.preparedSpells, item => item.Name === spell.Name);
      this.$forceUpdate(); //TODO see previous todo
    },
    castSpell(spell){
      if(spell.cast){
        spell.cast++
      } else {
        spell.cast = 1;
      }
      this.$set(this.spellList, spell.Name, spell); 
      this.$forceUpdate(); //TODO see previous todo
    },
    getAvailableToPrepareNumber(){
      let numberPrepared = this.preparedSpells.length;
      return parseInt(this.mainCharacter.level) + parseInt(this.mainCharacter.wis_mod) - numberPrepared;
    },
    getPreparedSpells(){
      return this.preparedSpells;
    }
  },
  props: ['spells', 'character'],
  data() {
      return {
          spellList: JSON.parse(this.spells),
          mainCharacter: JSON.parse(this.character),
          preparedSpells: [],
          castSpells: []
      } 
  }
};
</script>