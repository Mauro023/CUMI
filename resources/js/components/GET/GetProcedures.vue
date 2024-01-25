<!-- En tu archivo .vue -->
<template>
    <div>
        <v-app>
            <!-- Otras partes de tu interfaz -->
            <v-btn @click="startProcess">Iniciar Proceso</v-btn>
            <v-progress-circular v-if="showProgress" :size="50" :width="3" :value="progress"
                color="primary"></v-progress-circular>
        </v-app>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            showProgress: false,
            progress: 0,
        };
    },
    methods: {
        async startProcess() {
            try {
                // Lógica para iniciar el proceso
                console.log('Proceso iniciado correctamente');
                await axios.get('/getProcedures'); // Ajusta la ruta según tu aplicación
                this.showProgress = true;
            } catch (error) {
                console.error('Error al iniciar el proceso:', error);
            }
        },
      async fetchProgress() {
            try {
                const response = await axios.get('/getProgress'); // Ajusta la ruta según tu aplicación
                this.progress = response.data.progress;
                if (this.progress < 100) {
                    setTimeout(() => this.fetchProgress(), 1000); // Actualiza cada segundo
                } else {
                    this.showProgress = false;
                }
            } catch (error) {
                console.error('Error al obtener el progreso:', error);
            }
        },
    },
};
</script>
  
<style scoped lang="scss">
::v-deep .v-application--wrap {
    min-height: fit-content;
}

::v-deep .v-dialog {
    box-shadow: none;
}
</style>
  