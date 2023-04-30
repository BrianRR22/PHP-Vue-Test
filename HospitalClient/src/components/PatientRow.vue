<script>
import { mapActions } from 'pinia'
import { usePatientStore } from '../stores/patients'

export default {
    props: ['patient', 'index'],
    methods: {
        ...mapActions(usePatientStore, ['deletePatient'])
    }
}
</script>

<template>
    <tr>
        <td>{{ index + 1 }}</td>
        <td>{{ patient.name }}</td>
        <td>{{ patient.sex }}</td>
        <td>{{ patient.nik }}</td>
        <td>
            <button type="button" class="btn btn-primary mx-2" @click.prevent="$router.push('/detail/' + patient.id)">Detail</button>
            <button type="button" class="btn btn-warning mx-2" @click.prevent="$router.push('/edit/' + patient.id)">Edit</button>
            <button type="button" class="btn btn-danger mx-2" @click.prevent="deletePatient(patient.id)">Delete</button>
        </td>
    </tr>
</template>
