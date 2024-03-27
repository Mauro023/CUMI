<template>
    <v-app>
        <v-container>
            <v-row>
                <v-col cols="12" sm="6" md="4">
                    <div class="d-flex align-start">
                        <h3>General</h3>
                        <v-avatar tile size="30" color="yellow darken-2" class="rounded-lg ml-2">
                            <span style="color: white;">
                                <strong>4</strong>
                            </span>
                        </v-avatar>
                    </div>
                </v-col>
            </v-row>
            <v-divider class="mt-0"></v-divider>
            <v-row>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('procedure')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="#F4A040" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-file-document-outline
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Procedimientos
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de procedimientos</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('soat')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="#F4A040" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-file-document-outline
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Soat
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de tarifas soat</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('unit')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="yellow darken-2" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-hand-coin-outline
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Costo unitario
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Cálculo del costo unitario</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('general')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="yellow darken-2" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-currency-usd
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Costo general
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de costos generales</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
            </v-row>
        </v-container>
        <v-container>
            <v-row>
                <v-col cols="12" sm="6" md="4">
                    <div class="d-flex align-start">
                        <h3>Médicos</h3>
                        <v-avatar tile size="30" color="#27BFD6" class="rounded-lg ml-2">
                            <span style="color: white;">
                                <strong>3</strong>
                            </span>
                        </v-avatar>
                    </div>
                </v-col>
            </v-row>
            <v-divider class="mt-0"></v-divider>
            <v-row>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('rates')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="#27BFD6" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-file-sign
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Tarifas <br> diferenciales
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de tarifas diferenciales</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('fees')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="#27BFD6" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-stethoscope
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Manual <br> pago
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de honorarios médicos</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('doctor')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="#27BFD6" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-doctor
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Médicos
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de médicos</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
            </v-row>
        </v-container>
        <v-container>
            <v-row>
                <v-col cols="12" sm="6" md="4">
                    <div class="d-flex align-start">
                        <h3>Articulos</h3>
                        <v-avatar tile size="30" color="#55D46B" class="rounded-lg ml-2">
                            <span style="color: white;">
                                <strong>4</strong>
                            </span>
                        </v-avatar>
                    </div>
                </v-col>
            </v-row>
            <v-divider class="mt-0"></v-divider>
            <v-row>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('article')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="#55D46B" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-shopping-outline
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Articulos
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de articulos</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('basket')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="#55D46B" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-basket-fill
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Canasta
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de canasta</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('consumable')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="#55D46B" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-basket-fill
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Consumibles
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de consumibles</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('rented')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="#55D46B" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-basket-fill
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Equipos alquilados
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de equipos alquilados</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
            </v-row>
        </v-container>
        <v-container>
            <v-row>
                <v-col cols="12" sm="6" md="4">
                    <div class="d-flex align-start">
                        <h3>Cirugias</h3>
                        <v-avatar tile size="30" color="red darken-2" class="rounded-lg ml-2">
                            <span style="color: white;">
                                <strong>3</strong>
                            </span>
                        </v-avatar>
                    </div>
                </v-col>
            </v-row>
            <v-divider class="mt-0"></v-divider>
            <v-row>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('surgery')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="red darken-2" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-hospital-box-outline
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Cirugia
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de cirugias</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('mprocedures')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="red darken-2" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-hospital-box-outline
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Procedimientos<br>x cirugia
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Registro y gestión de cirugias</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                    <v-hover v-slot="{ hover }">
                        <v-card class="mx-auto" max-width="344" outlined @click="handleCardClick('logOperation')"
                            :elevation="hover ? 16 : 2" :class="{ 'on-hover': hover }">
                            <v-list-item three-line>
                                <v-list-item-avatar tile size="50" color="yellow darken-2" class="rounded-xl">
                                    <v-icon style="font-size: 150%;" color="white">
                                        mdi-hand-coin-outline
                                    </v-icon>
                                </v-list-item-avatar>
                                <v-list-item-content>
                                    <v-list-item-title class="text-h5 mb-1">
                                        Costo x<br> procedimiento
                                    </v-list-item-title>
                                    <v-list-item-subtitle>Calculo del costo</v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </v-hover>
                </v-col>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
export default {
    props: {
        labourRoute: String,
        proceduresRoute: String,
        articlesRoute: String,
        basketRoute: String,
        consumableRoute: String,
        rateRoute: String,
        feesRoute: String,
        doctorsRoute: String,
        surgeriesRoute: String,
        unitRoute: String,
        generalRoute: String,
        soatRoute: String,
        msurgeryRoute: String,
        logRoute: String,
        rentedRoute: String,
    },
    methods: {
        handleCardClick(route) {
            if (route === 'labour') {
                window.location.href = this.labourRoute;
            } else if (route === 'procedure') {
                window.location.href = this.proceduresRoute;
            } else if (route === 'rates') {
                window.location.href = this.rateRoute;
            } else if (route === 'fees') {
                window.location.href = this.feesRoute;
            } else if (route === 'doctor') {
                window.location.href = this.doctorsRoute;
            } else if (route === 'article') {
                window.location.href = this.articlesRoute;
            } else if (route === 'basket') {
                window.location.href = this.basketRoute;
            } else if (route === 'consumable') {
                window.location.href = this.consumableRoute;
            } else if (route === 'surgery') {
                window.location.href = this.surgeriesRoute;
            } else if (route === 'unit') {
                window.location.href = this.unitRoute;
            } else if (route === 'general') {
                window.location.href = this.generalRoute;
            } else if (route === 'soat') {
                window.location.href = this.soatRoute;
            } else if (route === 'mprocedures') {
                window.location.href = this.msurgeryRoute;
            } else if (route === 'logOperation') {
                window.location.href = this.logRoute;
            } else if (route === 'rented') {
                window.location.href = this.rentedRoute;
            }
        }
    }
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

<style>
.v-divider {
    color: #22a708;
}

h3 {
    color: black;
}
</style>
