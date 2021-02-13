<template>
  <div> 
    <multiselect
    v-model="value" 
    :options="options"
    :multiple="true" 
    :close-on-select="false" 
    :clear-on-select="false" 
    :preserve-search="true" 
    label="name" 
    @select="addToHiddenInput"
    @remove="removeFromHiddenInput"
    track-by="id">
    </multiselect>
    <input type="hidden" v-model="selectedValues" :name="name">
  </div>
</template>

<script>
  import Multiselect from 'vue-multiselect'
  export default {
    props: ['options', 'name', 'preselect'],
    components: { Multiselect },
    data () {
      return {
        value: [],
        selectedValues: [],
      }
    },

    methods: {
      addToHiddenInput: function (value) {
        this.selectedValues.push(value.id);
      },
      removeFromHiddenInput: function (value) {
        const index = this.selectedValues.indexOf(value.id);
        if (index > -1) {
          this.selectedValues.splice(index, 1);
        }
      }
    },
    
    mounted: function () {
      if(this.preselect) {
        if(Array.isArray(this.preselect)) {
          this.preselect.forEach(preselect => {
            this.selectedValues.push(preselect);
            // This is temp. solution. Maybe we can optimize it more?
            var elementPos = this.options.map(function(option) {
              return option.id; 
            }).indexOf(preselect);
            var objectFound = this.options[elementPos];
            this.value.push(objectFound);
          });
        }
      }
    }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>