<template>
    <div>
        <div>
            <table class="table table-bordered table-centered">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Critico</th>
                        <th>Mayor</th>
                        <th>Menor</th>
                        <th>N/A</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in items" :key="index">
                        <td>
                            <textarea class="w-100" placeholder="Descripción" v-model="item.description"></textarea>
                        </td>
                        <td>
                            <input type="radio" :name="'value' + index" value="Si" v-model="item.value"/>
                        </td>
                        <td>
                            <input type="radio" :name="'value' + index" value="No" v-model="item.value"/>
                        </td>
                        <td>
                            <input type="radio" :name="'value' + index" value="NA" v-model="item.value"/>
                        </td>
                        <td>
                            <textarea class="w-100" v-model="item.observations" placeholder="Observaciones"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <label for="item">Seleccione plantilla:</label>
                    <select class="form-control" @change="setTemplate" v-model="template">
                        <option value="TEMPLATE_ONE">Plantilla 1</option>
                        <option value="TEMPLATE_TWO">Plantilla 2</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TEMPLATES from '../utils'

    const ITEM_TEMPLATE = {
        description: '',
        value: '',
        observations: ''
    };

    export default {
        name: 'DescriptionFormatter',
        data() {
            return {
                items: [],
                template: 'TEMPLATE_ONE'
            }
        },
        methods: {
            addItem() {
                const ITEM_TEMPLATE = {
                    description: '',
                    value: '',
                    observations: ''
                };

                this.items.push(ITEM_TEMPLATE)
            },
            setTemplate() {
                this.items = TEMPLATES[this.template]
            }
        }
    }
</script>