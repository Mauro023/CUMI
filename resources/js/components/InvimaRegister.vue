<template>
  <div class="row">
    <div class="form-group col-sm-6">
      <label clas for="item">Registro invima:</label>
        <select v-model="selectedCategory" class="form-control custom-select" name="invima_registrations_id">
            <option v-for="category in data" :value="category.id">{{ category.health_register}}</option>
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label for="details">Vigencia del registro:</label>
        <input type="date" v-model="validity_registration" class="form-control" name="registration_validityt"/>
      </div>  
      <div class="form-group col-sm-6">
        <label for="details">Laboratorio fabricante:</label>
        <input type="text" v-model="laboratory_manufacturer" class="form-control" name="manufacturer_laboratoryt"/>
      </div>
  </div>

</template>

<script>
export default {
  props: {
      data: {
        type: Array // Define el tipo de dato como Array
      },
        
      select: {
        type: Array,
        default: []
      }
  },
  data() {
      return {
          selectedCategory: null,
          validity_registration: '',
          laboratory_manufacturer: ''
      };
  },
  mounted() {
    if (this.select){
      console.log(this.select);
      this.selectedCategory = this.select[0].id;
    }
  },
  watch: {
    selectedCategory(newCategoryId) {
      if (newCategoryId) {
        // Busca los detalles de la categoría en los datos cargados
        const selectedCategory = this.data.find(category => category.id === newCategoryId);
        
        // Actualiza los detalles en la propiedad selectedCategoryDetails
        if (selectedCategory) {
          this.validity_registration = `${selectedCategory.validity_registration}`;
          this.laboratory_manufacturer = `${selectedCategory.laboratory_manufacturer}`;
        } else {
          this.validity_registration = '';
          this.laboratory_manufacturer = '';
        }
      } else {
        this.validity_registration = '';
        this.laboratory_manufacturer = '';
      }
    }
  }
};
</script>
