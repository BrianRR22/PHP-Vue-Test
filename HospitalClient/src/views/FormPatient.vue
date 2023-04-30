<script>
import { mapActions, mapState } from 'pinia'
import { usePatientStore } from '../stores/patients'

export default {
    data() {
        return {
            inputPatient: {
                name: '',
                sex: '',
                religion: '',
                phone: '',
                address: '',
                nik: '',
            },
            id: ''
        }
    },
    computed: {
        ...mapState(usePatientStore, ['patients'])
    },
    methods: {
        ...mapActions(usePatientStore, ['fetchPatient', 'addPatient', 'fetchOnePatient', 'editPatient'])
    },

    async created() {
        try {
            if (this.$route.params.id) {
                let { data } = await this.fetchOnePatient(this.$route.params.id)
                this.id = data.id
                this.inputPatient.name = data.name
                this.inputPatient.sex = data.sex
                this.inputPatient.religion = data.religion
                this.inputPatient.phone = data.phone
                this.inputPatient.address = data.address
                this.inputPatient.nik = data.nik
            } else {
                this.fetchPatient()
            }
        } catch (error) {
            console.log(error);
        }
    }
}
</script>

<template>
    <div class="container">
        <div class="border w-50 p-5 mx-auto">
            <h2 class="text-center mb-3">Patient Data</h2>
            <form @submit.prevent="this.$route.params.id ? editPatient(inputPatient, id) : addPatient(inputPatient)">
                <div class=" mb-4 mx-auto">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example1">Username</label>
                        <input type="text" id="form3Example1" class="form-control" required v-model="inputPatient.name" />
                    </div>
                </div>

                <div class=" mb-4 mx-auto">
                    <label class="form-label mx-2" for="form3Example1">Sex: </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="Male" v-model="inputPatient.sex">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="Female" v-model="inputPatient.sex">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                </div>



                <div class=" mb-4 mx-auto">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example1">Religion</label>
                        <input type="text" id="form3Example1" class="form-control"  required
                            v-model="inputPatient.religion" />
                    </div>
                </div>

                <div class=" mb-4 mx-auto">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example1">Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            <input type="tel" class="form-control" id="phoneInput" required
                                v-model="inputPatient.phone">
                        </div>

                    </div>
                </div>

                <div class=" mb-4 mx-auto">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example1">Address</label>
                        <input type="text" id="form3Example1" class="form-control" required
                            v-model="inputPatient.address" />
                    </div>
                </div>

                <div class=" mb-4 mx-auto">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example1">NIK</label>
                        <input type="number" id="form3Example1" class="form-control" v-model="inputPatient.nik" min="0" />
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary mx-1" type="submit" v-if="!this.$route.params.id">Save</button>
                    <button class="btn btn-primary mx-1" type="submit" v-if="this.$route.params.id">Edit</button>
                    <button class="btn btn-light mx-1" type="button" @click="$router.go(-1)">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style>
.input-group {
    display: flex;
    align-items: center;
}

.input-group .input-group-prepend {
    width: 50px;
}

.input-group .form-control {
    flex: 1;
}
</style>
