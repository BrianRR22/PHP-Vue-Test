<script>
import { mapActions, mapState } from 'pinia'
import PatientRow from '../components/PatientRow.vue'
import { usePatientStore } from '../stores/patients'


export default {
    name: "PatientView",
    data() {
        return {
            result: {}
        };
    },
    computed: {
        ...mapState(usePatientStore, ["patients"])
    },
    methods: {
        ...mapActions(usePatientStore, ["fetchPatient"])
    },
    created() {
        this.fetchPatient();
    }
    // mounted() {
    //     console.log("mounted() called.......");
    // },
    // methods: {
    //     PatientLoad() {
    //         let page = "http://127.0.0.1:8000/api/patients";
    //         axios.get(page)
    //             .then(
    //                 ({ data }) => {
    //                     console.log(data);
    //                     this.result = data;
    //                 }
    //             );
    //     },
    // }
    ,
    components: { PatientRow }
}
</script>

<template>
    <div class="container">
        <button class="btn btn-primary mx-1 my-4" type="submit" @click.prevent="$router.push('/add')">Add Patient</button>
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>NIK</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <PatientRow v-for="(patient, index) in patients" :key="patient.id" :patient="patient" :index="index" />
            </tbody>
        </table>
    </div>
</template>
  
<style>
.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
    border-collapse: collapse;
}

.table th,
.table td {
    /* padding: 0.75rem; */
    vertical-align: middle;
    border-top: solid #dee2e6;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table tbody+tbody {
    border-top: 2px solid #dee2e6;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.075);
}
</style>
  