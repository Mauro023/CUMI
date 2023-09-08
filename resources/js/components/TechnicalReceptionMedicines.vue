<template>
    <div>
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="details">Plantilla:</label>
                <select v-model="selectedCategory" class="form-control custom-select">
                    <option v-for="category in data" :value="category.id">{{ category.template_name }}</option>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="details">Nombre generico:</label>
                <input type="text" v-model="generic_namet" class="form-control" name="generic_name" />
            </div>
            <div class="form-group col-sm-3">
                <label for="details">Nombre comercial:</label>
                <input type="text" v-model="tradenamet" class="form-control" name="tradename" />
            </div>
            <div class="form-group col-sm-3">
                <label for="details">Concentracion:</label>
                <input type="text" v-model="concentrationt" class="form-control" name="concentration" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <label clas for="item">Forma farmaceutica:</label>
                        <select class="form-control custom-select" @change="setTemplate" v-model="template"
                            name="pharmaceutical_form">
                            <option value="Aerosol">Aerosol</option>
                            <option value="Ampolla">Ampolla</option>
                            <option value="Caja">Caja</option>
                            <option value="Capsula">Capsula</option>
                            <option value="Comprimido">Comprimido</option>
                            <option value="CremaTopica">Crema topica</option>
                            <option value="Emulsion">Emulsion</option>
                            <option value="Frasco">Frasco</option>
                            <option value="FrascosVial">Frascos Vial</option>
                            <option value="GelTopico">Gel topico</option>
                            <option value="Gotas">Gotas</option>
                            <option value="Granulados">Granulados</option>
                            <option value="Inhaladores">Inhalacion</option>
                            <option value="Jarabe">Jarabe</option>
                            <option value="Lata">Lata</option>
                            <option value="Liquida">Liquida</option>
                            <option value="Mezclado">Mezclado</option>
                            <option value="Otico">Otico</option>
                            <option value="Ovulo">Ovulo</option>
                            <option value="ParcheTransdermico">Parche termico</option>
                            <option value="PolvoSuspensionOral">Polvo para suspension</option>
                            <option value="Polvo">Polvo</option>
                            <option value="PolvoEsteril">Polvo esteril</option>
                            <option value="PolvoEsterilReconstituir">Polvo esteril para reconstituir</option>
                            <option value="PolvoLiofilizado">Polvo liofilizado</option>
                            <option value="PolvoReconstituir">Polvo para reconstituir</option>
                            <option value="PolvoSolucionInyectable">Polvo para solucion inyectable</option>
                            <option value="Pomada">Pomada</option>
                            <option value="Pote">Pote</option>
                            <option value="Solucion">Solucion</option>
                            <option value="SolucionInyectable">Solucion inyectable</option>
                            <option value="SolucionNasal">Solucion nasal</option>
                            <option value="SolucionOftalmica">Solucion oftalmica</option>
                            <option value="SolucionOral">Solucion oral</option>
                            <option value="solucionInfusion">solucion para infusion</option>
                            <option value="SolucionInhalar">Solucion para inhalar</option>
                            <option value="SolucionNebulizar">Solucion para nebulizar</option>
                            <option value="SolucionTopica">Solucion topica</option>
                            <option value="Suspension">Suspension</option>
                            <option value="SuspensionInyectable">Suspension inyectable</option>
                            <option value="SuspensionOral">Suspension oral</option>
                            <option value="SuspensiónRectal">Suspensión rectal</option>
                            <option value="Tableta">Tableta</option>
                            <option value="Unguento">Unguento</option>
                            <option value="UnguentoTopica">Unguento topica</option>
                            <option value="Vial">Vial</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-3">
                <label for="details">Presentacion:</label>
                <input type="text" v-model="presentationt" class="form-control" name="presentation" />
            </div>
            <div class="form-group col-sm-3">
                <label for="details">Registro invima:</label>
                <input type="hidden" v-model="invima_registrations_id" class="form-control" name="invima_registrations_id" />
    
                <select v-model="invima_registrations_id" class="form-control custom-select" name="invima_registrations_id">
                    <option v-for="category in invima" :value="category.id">{{ category.health_register}}</option>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="details">Laboratorio fabricante:</label>
                <input type="text" v-model="manufacturer_laboratoryt" class="form-control" name="manufacturer_laboratory" />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="details">Vigencia del registro:</label>
                <input type="date" v-model="registration_validityt" class="form-control" name="registration_validity" />
            </div>
            <div class="form-group col-sm-3">
                <label for="details">Muestras recibidas:</label>
                <input type="text" v-model="received_amountt" class="form-control" name="received_amount" />
            </div>
            <div class="form-group col-sm-3">
                <label for="details">Cantidad recibida:</label>
                <input type="text" v-model="samplet" class="form-control" name="sample" />
            </div>
        </div>
        <table class="table table-bordered table-centered">
            <thead class="text-center">
                <tr>
                    <th>Descripcion</th>
                    <th>Critico</th>
                    <th>Mayor</th>
                    <th>Menor</th>
                    <th>Optimo</th>
                    <th>NA</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="(item, index) in items" :key="index">
                    <td>
                        <label for="description" class="w-100"><span>{{ item.description }}</span></label>
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" type="radio"
                                :name="item.name" :id="'value' + index + 'Critico'" value="Critico"
                                v-model="item.value" />
                            <label class="custom-control-label" :for="'value' + index + 'Critico'"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" type="radio"
                                :name="item.name" :id="'value' + index + 'Mayor'" value="Mayor"
                                v-model="item.value" />
                            <label class="custom-control-label" :for="'value' + index + 'Mayor'"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-warning" type="radio"
                                :name="item.name" :id="'value' + index + 'Menor'" value="Menor"
                                v-model="item.value"/>
                            <label class="custom-control-label" :for="'value' + index + 'Menor'"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-success" type="radio"
                                :name="item.name" :id="'value' + index + 'Optimo'" value="Optimo"
                                v-model="item.value"/>
                            <label class="custom-control-label" :for="'value' + index + 'Optimo'"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-secondary" type="radio"
                                :name="item.name" :id="'value' + index + 'NA'" value="NA"
                                v-model="item.value"/>
                            <label class="custom-control-label" :for="'value' + index + 'NA'"></label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
import TEMPLATES from '../utils/index.js';

export default {
    name: 'TechnicalReceptionMedicines',
    props: {
        data: {
            type: Array // Define el tipo de dato como Array
        },
        invima: {
            type: Array // Define el tipo de dato como Array
        },
        medicine: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            items: [],
            template: 'TEMPLATE_ONE', // Agrega la propiedad template
            selectedTemplate: 'TEMPLATE_ONE', // Agrega la propiedad selectedTemplate
            selectedCategory: null,
            generic_namet: '',
            tradenamet: '',
            concentrationt: '',
            pharmaceutical_formt: '',
            presentationt: '',
            registration_validityt: '',
            manufacturer_laboratoryt: '',
            received_amountt: '',
            samplet: '',
            invima_registrations_id: null,
        }
    },
    mounted() {
        this.generic_namet = this.medicine.generic_name;
        this.tradenamet = this.medicine.tradename;
        this.concentrationt = this.medicine.concentration;
        this.template = this.medicine.pharmaceutical_form;
        this.presentationt = this.medicine.presentation;
        this.registration_validityt = this.medicine.registration_validity;
        this.manufacturer_laboratoryt = this.medicine.manufacturer_laboratory;
        this.received_amountt = this.medicine.received_amount;
        this.samplet = this.medicine.sample;
        this.invima_registrations_id = this.medicine.invima_registrations_id;
        this.selectedTemplate = this.template;
        this.items = TEMPLATES[this.selectedTemplate];

        this.items.forEach(item => {    
            if(item.name == "lettering"){
                item.value = this.medicine.lettering;
            }else{
                if(item.name == "packing"){
                    item.value = this.medicine.packing;
                }else{
                    if(item.name == "laminate"){
                        item.value = this.medicine.laminate;
                    }else{
                        if(item.name == "closing"){
                            item.value = this.medicine.closing;
                        }else{
                            if(item.name == "all"){
                                item.value = this.medicine.all;
                            }else{
                                if(item.name == "liquids"){
                                    item.value = this.medicine.liquids;
                                }else{
                                    if(item.name == "semisolid"){
                                        item.value = this.medicine.semisolid;
                                    }else{
                                        if(item.name == "dust"){
                                            item.value = this.medicine.dust;
                                        }else{
                                            if(item.name == "tablet"){
                                                item.value = this.medicine.tablet;
                                            }else{
                                                if(item.name == "capsule"){
                                                    item.value = this.medicine.capsule;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            });
    },
    methods: {
        setTemplate() {
            this.selectedTemplate = this.template;
            this.items = TEMPLATES[this.selectedTemplate];

            this.items.forEach(item => {
                item.value = "Optimo";
            });
        }
    },
    watch: {
    selectedCategory(newCategoryId) {
      if (newCategoryId) {
        // Busca los detalles de la categoría en los datos cargados
        const selectedCategory = this.data.find(category => category.id === newCategoryId);
        // Actualiza los detalles en la propiedad selectedCategoryDetails
        if (selectedCategory) {  
            this.generic_namet = `${selectedCategory.generic_namet}`;
            this.tradenamet = `${selectedCategory.tradenamet}`;
            this.concentrationt = `${selectedCategory.concentrationt}`;
            this.template = `${selectedCategory.pharmaceutical_formt}`;
            this.presentationt = `${selectedCategory.presentationt}`;
            this.received_amountt = `${selectedCategory.received_amountt}`;
            this.samplet = `${selectedCategory.samplet}`;
            this.invima_registrations_id = `${selectedCategory.invima_registrations_id}`;
            this.registration_validityt = `${selectedCategory.registration_validityt}`;
            this.manufacturer_laboratoryt = `${selectedCategory.manufacturer_laboratoryt}`;
            this.selectedTemplate = this.template;
            this.items = TEMPLATES[this.selectedTemplate];

            this.items.forEach(item => {
                item.value = "Optimo";
            });
            
        } else {
            this.generic_namet = '';
            this.tradenamet = '';
            this.concentrationt = '';
            this.template = '';
            this.presentationt = '';
            this.validity_registrationt = '';
            this.manufacturer_laboratoryt = '';
            this.received_amountt = '';
            this.samplet = '';
            this.invima_registrations_id = '';
        }
      } else {
            this.generic_namet = '';
            this.tradenamet = '';
            this.concentrationt = '';
            this.template = '';
            this.presentationt = '';
            this.validity_registrationt = '';
            this.manufacturer_laboratoryt = '';
            this.received_amountt = '';
            this.samplet = '';
            this.invima_registrations_id = '';
      }
    },
    invima_registrations_id(newCategoryId) {
      if (newCategoryId) {
        // Busca los detalles de la categoría en los datos cargados
        const selectedCategory = this.invima.find(category => category.id === newCategoryId);
        
        // Actualiza los detalles en la propiedad selectedCategoryDetails
        if (selectedCategory) {
            this.registration_validityt = `${selectedCategory.validity_registration}`;
            this.manufacturer_laboratoryt = `${selectedCategory.laboratory_manufacturer}`;
        }
      } else {
        this.validity_registrationt = '';
        this.manufacturer_laboratoryt = '';
      }
    }
  }
}
</script>
