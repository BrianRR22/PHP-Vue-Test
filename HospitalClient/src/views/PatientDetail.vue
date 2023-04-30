<script>
import { mapActions, mapState } from 'pinia'
import { usePatientStore } from '../stores/patients'


export default {
    name: "PatientView",
    data() {
        return {
            patient: {
                name: '',
                sex: '',
                religion: '',
                phone: '',
                address: '',
                nik: '',
            },
            id: ''
        };
    },
    computed: {
        ...mapState(usePatientStore, ["patients"])
    },
    methods: {
        ...mapActions(usePatientStore, ["fetchOnePatient"])
    },
    async created() {
        let { data } = await this.fetchOnePatient(this.$route.params.id)
        this.id = data.id
        this.patient.name = data.name
        this.patient.sex = data.sex
        this.patient.religion = data.religion
        this.patient.phone = data.phone
        this.patient.address = data.address
        this.patient.nik = data.nik
    },
}
</script>

<template>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Patient Details</h5>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Name:</strong></div>
                            <div class="col-sm-8">{{ patient.name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Sex:</strong></div>
                            <div class="col-sm-8">{{ patient.sex }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Religion:</strong></div>
                            <div class="col-sm-8">{{ patient.religion }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Phone:</strong></div>
                            <div class="col-sm-8">(+62) {{ patient.phone }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>Address:</strong></div>
                            <div class="col-sm-8">{{ patient.address }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong>NIK:</strong></div>
                            <div class="col-sm-8">{{ patient.nik }}</div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-secondary" @click="$router.push('/')">
                                Back to Patient List
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.card {
    border: none;
    box-shadow: 0px 0px 10px #ccc;
}

.card-body {
    padding: 30px;
}

.card-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.row {
    margin-bottom: 10px;
}

button {
    margin-top: 20px;
}
</style>

  
  