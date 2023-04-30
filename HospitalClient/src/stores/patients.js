import { defineStore } from 'pinia'
import axios from 'axios'

const origin = 'http://127.0.0.1:8000/api'

export const usePatientStore = defineStore('patient', {
  state() {
    return {
      patients: []
      // myCourses: []
    }
  },
  actions: {
    async fetchPatient() {
      try {
        const { data } = await axios({
          method: 'GET',
          url: origin + '/patients'
        })

        this.patients = data
      } catch (error) {
        console.log(error)
      }
    },
    async addPatient(inputPatient) {
      try {
        const { data } = await axios({
          method: 'POST',
          url: origin + '/add',
          data: inputPatient
        })
        swal('Add Patient!', 'Success Add New Patient!', 'success')
        this.fetchPatient()
        this.router.push('/')
      } catch (error) {
        console.log(error)
      }
    },
    fetchOnePatient(id) {
      return axios({
        method: 'GET',
        url: origin + '/patients/' + id
      })
    },
    async editPatient(inputPatient, id) {
      try {
        const { data } = await axios({
          method: 'PUT',
          url: origin + '/edit/' + id,
          data: inputPatient
        })
        swal('Edit Patient!', 'Success Edit Patient!', 'success')
        this.fetchPatient()
        this.router.push('/')
      } catch (error) {
        console.log(error)
      }
    },
    async deletePatient(id) {
      try {
        const result = await swal({
          title: 'Are you sure?',
          text: 'Once deleted, you will not be able to recover this imaginary file!',
          icon: 'warning',
          buttons: true,
          dangerMode: true
        })
        console.log(result)
        if (result) {
          console.log('masuk')
          await axios({
            method: 'DELETE',
            url: origin + '/delete/' + id
          })
          // swal('Deleted!', 'Your file has been deleted.', 'success')
          this.fetchPatient()
          location.reload()
          // this.router.push('/')
        }
      } catch (err) {
        let messageError = err.response.data.message
        swal('Your imaginary file is safe!')
      }
    }
  }
})
