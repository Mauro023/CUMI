<template>
  <div id="app">
    <VueSignaturePad id="signature" width="350px" height="200px" ref="signaturePad" name="signatureInput" v-model="employeSignature" />
    <div>
      <button @click.prevent="save">Save</button>
      <button @click.prevent="undo">Undo</button>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import { VueSignaturePad } from 'vue-signature-pad';

export default defineComponent({
  name: 'MySignaturePad',
  components: { VueSignaturePad },
  data() {
    return {
      employeSignature: ''
    };
  },
  methods: {
    undo() {
      this.$refs.signaturePad.undoSignature();
    },
    save() {
      const { isEmpty, data } = this.$refs.signaturePad.saveSignature();
      console.log(isEmpty);
      console.log(data);
    }
  },
});
</script>

<style>
#signature {
  border: double 3px transparent;
  border-radius: 5px;
  background-image: linear-gradient(white, white),
    radial-gradient(circle at top left, #A3BF18, #00B0EA);
  background-origin: border-box;
  background-clip: content-box, border-box;
}
</style>