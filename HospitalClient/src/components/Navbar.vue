<script>
export default{
    methods: {
        // handleLogout(){
        //     localStorage.clear()
        //     swal("Logout!", "Success Logout!", "success");
        //     this.$router.push('/login')
        // }
    }
}

</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #f59e0b !important">
        <div class="container">
            <img src="https://global-uploads.webflow.com/5f0d53c042a9ed6288de7f8d/5f68150db527de25e82c86f1_Hacktiv8%20logo%20horizontal%2001%20black.png"
                alt="nav-logo" style="height: 40px" />
            <div class="me-auto"></div>
            <ul class="navbar-nav mx-2 mb-2 mb-lg-0">
                <li class="nav-item">
                    <router-link to="/" class="nav-link text-white" aria-current="page" href="#">List Patients</router-link>
                </li>
                <!-- <li class="nav-item">
                    <router-link to="/add" class="nav-link text-white" aria-current="page" href="#">Add Patient</router-link>
                </li> -->
            </ul>
        </div>
    </nav>
</template>
