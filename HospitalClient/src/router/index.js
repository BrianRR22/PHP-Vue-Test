import { createRouter, createWebHistory } from 'vue-router'
import PatientView from '../views/PatientView.vue'
import FormPatient from '../views/FormPatient.vue'
import PatientDetail from '../views/PatientDetail.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'patient',
      component: PatientView
    },
    {
      path: "/add",
      name: "add",
      component: FormPatient,
    },
    {
      path: "/edit/:id",
      name: "editPatient",
      component: FormPatient,
    },
    {
      path: "/detail/:id",
      name: "patientDetail",
      component: PatientDetail,
    },
  ]
})

export default router
