<template>
  <div class="row">
    <div class="form-group row">
      <!-- template name Field -->
      <div class="form-group col-sm-4">
        <label for="details">Nombre de plantilla:</label>
        <input type="text" v-model="template_name" class="form-control" name="template_name" placeholder="Ingrese el nombre de la plantilla"/>
      </div>
      <!-- Invima registrations id Field -->
      <div class="form-group col-sm-4">
        <label clas for="item">Registro invima:</label>
        <select v-model="selectedCategory" class="form-control" name="invima_registrations_id" ref="invima_registration">
          <option v-for="category in data" :value="category.id">{{ category.health_register }} - {{ category.tradename }}</option>
        </select>
      </div>
      <!-- Generic name Field -->
      <div class="form-group col-sm-4">
        <label for="details">Nombre genérico:</label>
        <input type="text" v-model="generic_name" class="form-control" placeholder="Ingrese el nombre genérico" />
      </div>
    </div>
    <div class="form-group row">
      <!-- Tradename Field -->
      <div class="form-group col-sm-4">
        <label for="details">Nombre comercial:</label>
        <input type="text" v-model="tradename" class="form-control" placeholder="Ingrese el nombre comercial" />
      </div>
      <!-- Pharmaceutical Formt Field -->
      <div class="form-group col-sm-4">
        <label for="details">Forma farmaceutica:</label>
        <input type="text" v-model="pharmaceutical_form" class="form-control" placeholder="Ingrese la forma farmaceutica" />
      </div>
      <!-- Validity registration Field -->
      <div class="form-group col-sm-4">
        <label for="details">Vigencia del registro:</label>
        <input type="text" v-model="validity_registration" class="form-control" id="date" placeholder="Ingrese la fecha de vencimiento" />
        <template>
  <div class="purple darken-2 text-center">
    <span class="white--text">Lorem ipsum</span>
  </div>
</template>
      </div>
    </div>
    <div class="form-group row">
      <!-- Laboratory manufacturer Field -->
      <div class="form-group col-sm-4">
        <label for="details">Laboratorio fabricante:</label>
        <input type="text" v-model="laboratory_manufacturer" class="form-control" placeholder="Ingrese el laboratorio fabricante" />
      </div>
      <!-- Concentrationt Field -->
      <div class="form-group col-sm-4">
        <label for="details">Concentracion:</label>
        <input type="text" v-model="concentrationt" class="form-control" name="concentrationt" placeholder="Ingrese la concentracion" />
      </div>
      <!-- Concentrationt Field -->
      <div class="form-group col-sm-4">
        <label for="details">Presentación:</label>
        <input type="text" v-model="presentationt" class="form-control" name="presentationt" placeholder="Ingrese la presentación" />
      </div>
    </div>
    <div class="form-group row">
      <!-- Received Amountt Field -->
      <div class="form-group col-sm-4">
        <label for="details">Cantidad recibidas:</label>
        <input type="number" v-model="received_amountt" class="form-control" name="received_amountt" placeholder="Ingrese la cantidad recibida"/>
      </div>
      <!-- Samplet Field -->
      <div class="form-group col-sm-4">
        <label for="details">Muestras:</label>
        <input type="number" v-model="samplet" class="form-control" name="samplet" placeholder="Ingrese la cantidad de muestras" />
      </div>
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
    },
  },
  data() {
    return {
      selectedCategory: null,
      //Datos de plantilla
      template_name: '',
      concentrationt: '',
      presentationt: '',
      received_amountt: '',
      samplet: '',
      //Datos de tabla invima
      validity_registration: '',
      laboratory_manufacturer: '',
      tradename: '',
      pharmaceutical_form: '',
      generic_name: '',
    };
  },
  mounted() {
    //date
    
    //Referencia al contexto del componente Vue
    const vm = this;

    //Select2
    const $select2 = $(this.$refs.invima_registration).select2({
      placeholder: "Seleccione la forma farmaceutica",
      allowClear: true,
      width: "100%",
      theme: "bootstrap4",
      language: {
        noResults: function () {
          return "No se encontraron resultados";
        },
        searching: function () {
          return "Buscando...";
        },
      }
    });

    //Valor por defecto si está disponible
    if (this.$attrs['medicationtemplate']) {
      this.template_name = this.$attrs['medicationtemplate'].template_name;
      this.concentrationt = this.$attrs['medicationtemplate'].concentrationt;
      this.presentationt = this.$attrs['medicationtemplate'].presentationt;
      this.received_amountt = this.$attrs['medicationtemplate'].received_amountt;
      this.samplet = this.$attrs['medicationtemplate'].samplet;

      // Establece el valor por defecto utilizando la opción data de Vue.js
      this.$nextTick(() => {
        $select2.val(this.$attrs['medicationtemplate'].invima_registrations_id).trigger('change');
      });
    }

    // Maneja el evento de cambio de Select2
    $select2.on('change', function () {
      vm.selectedCategory = $(this).val(); // Actualiza la propiedad selectedCategory usando la referencia vm
    });
  },



  watch: {
    selectedCategory(newCategoryId) {
      if (newCategoryId) {
        // Busca los detalles de la categoría en los datos cargados
        const selectedCategory = this.data.find(category => category.id === parseInt(newCategoryId));

        // Actualiza los detalles en la propiedad selectedCategoryDetails
        if (selectedCategory) {
          this.validity_registration = `${selectedCategory.validity_registration}`;
          this.laboratory_manufacturer = `${selectedCategory.laboratory_manufacturer}`;
          this.tradename = `${selectedCategory.tradename}`;
          this.pharmaceutical_form = `${selectedCategory.pharmaceutical_form}`;
          this.generic_name = `${selectedCategory.generic_name}`;
        } else {
          this.validity_registration = '';
          this.laboratory_manufacturer = '';
          this.tradename = '';
          this.pharmaceutical_form = '';
          this.generic_name = '';
        }
      } else {
        this.validity_registration = '';
        this.laboratory_manufacturer = '';
        this.tradename = '';
        this.pharmaceutical_form = '';
        this.generic_name = '';
      }
    }
  }
};
</script>
<style>
  .select2-selection__clear {
    position: absolute;
    right: 5%;
  }
</style>