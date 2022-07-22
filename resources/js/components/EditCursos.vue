<template>
    <div>
        <h4 class="text-center">Todos os Cursos</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="AddCursos">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="cursos.name">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" class="form-control" v-model="cursos.description">
                    </div>
                     <div class="form-group">
                        <label>Valor</label>
                        <input type="text" class="form-control" v-model="cursos.description">
                    </div>
                     <div class="form-group">
                        <label>Data de Início</label>
                        <input type="text" class="form-control" v-model="cursos.description">
                    </div>
                     <div class="form-group">
                        <label>Data do Término</label>
                        <input type="text" class="form-control" v-model="cursos.description">
                    </div>
                     <div class="form-group">
                        <label>Upload</label>
                        <input type="text" class="form-control" v-model="cursos.description">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar Curso</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cursos: {}
        }
    },
    methods: {
     updateCursos() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/cursos/add', this.cursos)
                    .then(response => {
                        this.$router.push({name: 'cursos'})
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
