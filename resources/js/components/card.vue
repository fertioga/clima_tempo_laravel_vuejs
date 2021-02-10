<template>
    <div class="card">
        <div v-if="header" :class="getClassHeader" v-html="header"></div>
       
        <slot class="card-body"></slot>    
        <div v-if="footer" class="card-footer" v-html="footer"></div>
    </div>    
</template>
<script>

export default {
  name: 'card',
  props: ['header','content','footer','class_header'],

  computed: {

    getClassHeader: function(){

      return  ( this.class_header )? 'card-header text-white text-uppercase  ' + this.class_header : 'card-header text-uppercase '; 
    
    }

  }
}
</script>