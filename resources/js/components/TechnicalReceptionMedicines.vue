<template>
    <div>
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <label clas for="item">Forma farmaceutica:</label>
                <select class="form-control custom-select" @change="setTemplate" v-model="template" name="pharmaceutical_form">
                    <option value="EmpaqueLiquido">Aerosol</option>
                    <option value="EmpaqueLiquido">Ampolla</option>
                    <option value="EmpaqueCierreLiquido">Caja</option>
                    <option value="Capsula">Capsula</option>
                    <option value="Comprimido">Comprimido</option>
                    <option value="EmpaqueCierreLiquido">Crema topica</option>
                    <option value="EmpaqueCierreLiquido">Emulsion</option>
                    <option value="EmpaqueLiquido">Frasco</option>
                    <option value="EmpaqueLiquido">Frascos Vial</option>
                    <option value="EmpaqueCierreLiquido">Gel topico</option>
                    <option value="Gotas_ParcheTermico">Gotas</option>
                    <option value="Granulado">Granulados</option>
                    <option value="EmpaqueLiquido">Inhalacion</option>
                    <option value="EmpaqueLiquido">Jarabe</option>
                    <option value="EmpaqueCierreLiquido">Lata</option>
                    <option value="EmpaqueCierreLiquido">Liquida</option>
                    <option value="EmpaqueCierreLiquido">Mezclado</option>
                    <option value="EmpaqueCierreLiquido">Otico</option>
                    <option value="Ovulo">Ovulo</option>
                    <option value="Gotas_ParcheTermico">Parche termico</option>
                    <option value="Polvo">Polvo para suspension</option>
                    <option value="Polvo">Polvo</option>
                    <option value="Polvo">Polvo esteril</option>
                    <option value="Polvo">Polvo esteril para reconstituir</option>
                    <option value="Polvo">Polvo liofilizado</option>
                    <option value="Polvo">Polvo para reconstituir</option>
                    <option value="Polvo">Polvo para solucion inyectable</option>
                    <option value="Pomada">Pomada</option>
                    <option value="Pote">Pote</option>
                    <option value="EmpaqueLiquido">Solucion</option>
                    <option value="EmpaqueLiquido">Solucion inyectable</option>
                    <option value="EmpaqueLiquido">Solucion nasal</option>
                    <option value="EmpaqueLiquido">Solucion oftalmica</option>
                    <option value="EmpaqueLiquido">Solucion oral</option>
                    <option value="EmpaqueLiquido">solucion para infusion</option>
                    <option value="EmpaqueLiquido">Solucion para inhalar</option>
                    <option value="EmpaqueLiquido">Solucion para nebulizar</option>
                    <option value="EmpaqueLiquido">Solucion topica</option>
                    <option value="EmpaqueCierreLiquido">Suspension</option>
                    <option value="EmpaqueCierreLiquido">Suspención oral</option>
                    <option value="EmpaqueCierreLiquido">Suspension inyectable</option>
                    <option value="EmpaqueCierreLiquido">Suspension oral</option>
                    <option value="EmpaqueCierreLiquido">Suspensión rectal</option>
                    <option value="Tableta">Tableta</option>
                    <option value="Unguento">Unguento topica</option>
                    <option value="Pote">Vial</option>
                </select>
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
                                :name="'value' + index" :id="'value' + index + 'Critico'" value="Critico"
                                v-model="item.value" />
                            <label class="custom-control-label" :for="'value' + index + 'Critico'"></label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" type="radio"
                                :name="'value' + index" :id="'value' + index + 'Mayor'" value="Mayor"
                                v-model="item.value" />
                            <label class="custom-control-label" :for="'value' + index + 'Mayor'"></label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" :name="'value' + index"
                                :id="'value' + index + 'Menor'" value="Menor" v-model="item.value" />
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-success" type="radio"
                                :name="'value' + index" :id="'value' + index + 'Optimo'" value="Optimo"
                                v-model="item.value" />
                            <label class="custom-control-label" :for="'value' + index + 'Optimo'"></label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" :name="'value' + index"
                                :id="'value' + index + 'NA'" value="NA" v-model="item.value" />
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
    data() {
        return {
            items: [],
            template: 'TEMPLATE_ONE', // Agrega la propiedad template
            selectedTemplate: 'TEMPLATE_ONE' // Agrega la propiedad selectedTemplate
        }
    },
    methods: {
        setTemplate() {
            this.selectedTemplate = this.template;
            this.items = TEMPLATES[this.selectedTemplate];
        }
    },
}
</script>
