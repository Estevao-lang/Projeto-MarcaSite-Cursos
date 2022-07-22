<template>
    <div>
        <h4 class="text-center">Todos os cursos</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Início</th>
                <th>Término</th>
                <th>Upload</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="cursos in cursos" :key="cursos.id">
                <td>{{ cursos.id }}</td>
                <td>{{ cursos.name }}</td>
                <td>{{ cursos.description }}</td>
                <td>{{ cursos.value }}</td>
                <td>{{ cursos.start_date }}</td>
                <td>{{ cursos.end_date }}</td>
                <td>{{ cursos.upload }}</td>

                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'EditCursos', params: { id: cursos.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteCursos(cursos.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/cursos/add')">Adicionar Curso </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cursos: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/cursos')
                .then(response => {
                    this.cursos = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteBook(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/books/delete/${id}`)
                    .then(response => {
                        let i = this.cursos.map(item => item.id).indexOf(id); // find index of your object
                        this.cursos.splice(i, 1)
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