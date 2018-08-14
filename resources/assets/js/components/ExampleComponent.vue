<template>
    <div class="container">
        <div class="row justify-content-center">
           <h1>Body</h1>
           <router-link to="test">test</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
