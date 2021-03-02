<template>
  <div>
    <!--
        <router-link :to="{ name: 'home' }" class="p-2 text-dark">Home</router-link>
        <router-link :to="{ name: 'login' }" class="p-2 text-dark" v-if="!$auth.check()">Login</router-link>
        <router-link :to="{ name: 'register' }" class="p-2 text-dark" v-if="!$auth.check()">Register</router-link>
        <a href="#" @click.prevent="$auth.logout()" class="p-2 text-dark" v-if="$auth.check()">Logout</a>
     -->
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
  export default {
      name:"App"
  }

</script>
